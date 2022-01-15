<?php

class Movie extends CI_Controller
{
    public function index()
    {
        $this->load->model('Movie_models', 'movie');
        $this->load->library('session');

        if ($this->input->post('submit')) {
            $input = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $input);
        } else {
            $input = $this->session->userdata('keyword');
        }

        if (isset($input) == null) {
            $input = 'one piece';
        }

        $input = str_replace(' ', '%20', $input);

        $pagination = (int) $this->input->post('pagination');
        if ($pagination == 0) {
            $pagination = 1;
        }

        $result = $this->movie->get_CURL("http://www.omdbapi.com?apikey=4b6572b7&s=" . $input . "&page=" . $pagination . "");

        if ($result['Response'] == "True") {
            $data = $result['Search'];
            $data['movies'] = $data;
            $data['total_results'] = $result['totalResults'];
        } else {
            $error = $result['Error'];
            $data['error'] = $error;
            $data['total_results'] = 0;
        }

        $this->load->view('home/index', $data);
    }
}
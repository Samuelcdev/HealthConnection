<?php
class PageController extends Controller
{
    public function index()
    {
        $this->render('Landing', 'home', [], 'site');
    }
}
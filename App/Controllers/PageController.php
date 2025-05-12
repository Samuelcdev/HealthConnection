<?php
class PageController extends Controller
{
    public function home()
    {
        $this->render('Landing', 'home', [], 'site');
    }
    public function listar()
    {
        echo "estoy en home";
    }
    public function nuevo()
    {
        echo "estoy en home";
    }
    public function eliminar()
    {
        echo "estoy en home";
    }
    public function actualizar()
    {
        echo "estoy en home";
    }
}
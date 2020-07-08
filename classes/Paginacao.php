<?php

// Verficando se a solicitação de acesso veio do servidor e não da URL
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../');
    exit;
}

include_once('Config.php');
include_once('conexao.php');
include_once('Read.php');

class Paginacao
{
    private $link;
    private $var;
    private $pagina;
    private $limiteResultado;
    private $offSet;
    private $query;
    private $parseString;
    private $resultBD;
    private $resultado;
    private $totalPaginas;
    private $maxLink = 2; //Total de numero de paginas antes e depois da que o usuário se encontra na paginação

    function getResultado()
    {
        return $this->resultado;
    }

    function getOffSet()
    {
        return $this->offSet;
    }

    function __construct($link, $var = null)
    {
        $this->link = $link;
        $this->var = $var;
    }

    public function condicao($pagina, $limiteResultado)
    {
        $this->pagina = (int) $pagina ? $pagina : 1;
        $this->limiteResultado = (int) $limiteResultado;
        $this->offSet = ($this->pagina * $this->limiteResultado) - $this->limiteResultado;
    }

    public function paginacao($query, $parseString = null)
    {

        $this->query = (string) $query;
        $this->parseString = (string) $parseString;

        $contar = new Read();
        $contar->fullRead($this->query, $this->parseString);
        $this->resultBD = $contar->getResultado();

        if ($this->resultBD[0]['num_result'] > $this->limiteResultado) {
            $this->instrucaoPaginacao();
        } else {
            $this->resultado = null;
        }
    }

    private function instrucaoPaginacao()
    {
        $this->totalPaginas = ceil($this->resultBD[0]['num_result'] / $this->limiteResultado);
        if ($this->totalPaginas >= $this->pagina) {
            $this->layoutPaginacao();
        } else {
            header("Location: {$this->link}");
        }
    }

    private function layoutPaginacao()
    {

        $this->resultado = "<nav aria-label='paginacao'>";
        $this->resultado .= "<ul class='pagination pagination-sm justify-content-center'>";
        $this->resultado .= "<li class='page-item'>";
        $this->resultado .= "<a class='page-link' href='" . $this->link . $this->var ."' tabindex='-1'>Primeira</a>";
        $this->resultado .= "</li>";
        for ($iPag = $this->pagina - $this->maxLink; $iPag <= $this->pagina - 1; $iPag++) {

            if ($iPag >= 1) {

                $this->resultado .= "<li class='page-item'><a class='page-link' href='" . $this->link . "/" . $iPag . $this->var ."'>$iPag</a></li>";
            }
        }

        $this->resultado .= "<li class='page-item active'>";
        $this->resultado .= "<a class='page-link' href='#'>" . $this->pagina . "</a>";
        $this->resultado .= "</li>";
        for ($dPag = $this->pagina + 1; $dPag <= $this->pagina + $this->maxLink; $dPag++) {

            if ($dPag <= $this->totalPaginas) {
                
                $this->resultado .= "<li class='page-item'><a class='page-link' href='" . $this->link . "/" . $dPag . $this->var . "'>$dPag</a></li>";
            }
        }

        $this->resultado .= "<li class='page-item'>";
        $this->resultado .= "<a class='page-link' href='" . $this->link . "/" . $this->totalPaginas . $this->var . "'>Última</a>";
        $this->resultado .= "</li>";
        $this->resultado .= "</ul>";
        $this->resultado .= "</nav>";
    }
}

<?php

class Pagination {

    private $currentPage =  1;
    private $totalPages;
    private $linksPerPage = 5; 
    private $itemsPerPage = 7;
    private $totalItems;
    private $pageIdentifier = 'page'; 

    public function setTotalItems($totalItems) {
        $this->totalItems = $totalItems;
    }

    public function setPageIdentifier($pageIdentifier) {
        $this->pageIdentifier = $pageIdentifier;
    }

    public function setItemsPerPage($itemsPerPage) {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function calculations($currentPage) {
       
        $this->currentPage = $currentPage;
      
        // $this->currentPage = 1;
       

       $offset = ($this->currentPage - 1) * $this->itemsPerPage;

       $this->totalPages = ceil($this->totalItems / $this->itemsPerPage);

       return $offset;
    } 

    public function getItemsPerPage() {
        return $this->itemsPerPage;
    }

    public function links() {
        $links = "<ul class='pagination'>";

        if($this->currentPage > 1) {
            $previous = $this->currentPage - 1;
            //aqui ele faz o merge de qualquer parâmetro recebido do get com o array 'page' (valor do pageIdentifier) => valor 
            $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier => $previous]));
            $first = http_build_query(array_merge($_GET, [$this->pageIdentifier => 1]));
            $links .= "<li class='page-item'><a href='?{$first}' class='page-link'>Primeira</a></li>";
            $links .= "<li class='page-item'><a href='?{$linkPage}' class='page-link'>Anterior</a></li>";
        }

        for($i = $this->currentPage - $this->linksPerPage; $i  <= $this->currentPage + $this->linksPerPage; $i++) {
            if($i > 0 && $i <= $this->totalPages) {
                $class =  $this->currentPage == $i ? 'active' : '';
                $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier => $i]));
                $links .= "<li class='page-item {$class}'><a href='?{$linkPage}' class='page-link'>{$i}</a></li>";
            }
        }

        if($this->currentPage < $this->totalPages) {
            $next = $this->currentPage + 1;
            //aqui ele faz o merge de qualquer parâmetro recebido do get com o array 'page' (valor do pageIdentifier) => valor 
            $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier => $next]));
            $last = http_build_query(array_merge($_GET, [$this->pageIdentifier => $this->totalPages]));
            $links .= "<li class='page-item'><a href='?{$linkPage}' class='page-link'>Próxima</a></li>";
            $links .= "<li class='page-item'><a href='?{$last}' class='page-link'>Última</a></li>";
        }

        $links .= "</ul>";

        return $links;
    }
}
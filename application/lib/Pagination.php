<?php

namespace application\lib;

class Pagination
{
    public $currentPage;
    public $coustPost;
    public $limit;
    public $start;

    public function __construct($route, $coustPost, $limit=5)
    {
        $this->currentPage = $this->setCurrentPage($route);
        $this->coustPost = $coustPost;
        $this->limit = $limit;
        $this->start = (($route['id'] ?? 1) - 1) * $this->limit;
    }
    public function setCurrentPage($route)
    {
        if (array_key_exists('id', $route) && $route['id'] !== 0)
            return $route['id'];
        if (!array_key_exists('id', $route) || $route['id'] !== 0)
            return 1;
    }
    public function draw()
    {
        $html = '<nav aria-label="News page"><ul class="pagination pagination-lg">';
        for ($i = 1; $i <= $this->amountPage(); $i++) {
            $html .= '<li class="page-item ';
            if ($this->currentPage === $i) $html .= 'active';
            $html .= '">';
            $this->currentPage !== $i ? $html .= $this->genereteHref($i) : $html .= '<span class="page-link">' . $i . '</span>';
            $html .= '</li>';
        }
        $html .= '</ul></nav>';
        return $html;
    }
    public function genereteHref($pageNumber)
    {
        $result = '<a class="page-link" href="';
        $pageNumber===1 ? $result .='/' : $result .=  '/page/'.$pageNumber;
        $result .= '">';
        $result .= $pageNumber;
        $result .= '</a>';
        return $result;
    }
    public function amountPage()
    {
        return ceil($this->coustPost / $this->limit);
    }
}

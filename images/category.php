<?php
// товари категорії
namespace ProcessWire;

// хлібні крихти + заголовок сторінки
echo '<div id="breadcrumbs">';
    foreach($page->parents() as $item) {
        echo '<a href=' . $item->url . '>' . $item->title . '</a> &nbsp; &#10096; &nbsp;'; 
    }
    echo '<span>' . $page->title . '</span>'; 
echo '</div><!-- #breadcrumbs --><hr>';

$cats = $pages->get('template=allcategory');

echo '<div class="tr"><div class="td-25"><h4>Усі категорії</h4><ul id="cat">';

foreach ($cats->children() as $item) {
    echo '<li><a href="' . $item->url . '">' . $item->title . '</a>';
    if($item->children() !== null){
        echo '<ul>';
        foreach ($item->children() as $value) {
            echo '<li><a href="' . $value->url . '">' . $value->title . '</a>';
            if ($value->children() !== null) {
                echo '<ul>';
                foreach($value->children() as $v){
                    echo '<li><a href="' . $v->url . '">' . $v->title . '</a></li>';
                }
                echo '</ul>';
            }
            echo '</li>';
        }
        echo '</ul>';
    }
    echo '</li>';
}

echo '</ul></div>';

// $suits = $pages->get('template=suit')->filter($page->suit_category);
// $suits = $pages->get('template=suit, filter=suit_category');

$suits = $pages->get('template=suit');

echo '<div class="td-75"><ul class="allcat">';
    foreach ($suits as $item) {
        if ($item->img) {
            $img = $item->img;
        } else {
            $img = '/site/templates/duncan/images/mouse_1.png';
        }
        
        echo '<li><div class="cat"><a href="' . $item->url . '"><img src="'. $img->size(270,400)->url .'" alt=""><span>' . $item->title . '</span></a></div></li>';
    }
echo '</ul></div>';

echo '</div><!--.tr-->';
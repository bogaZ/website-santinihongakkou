<?php
namespace App\Services;

class MetaService
{
         public $description, $keywords, $author, $title, $image, $url, $icon;
         public function __construct(
                  $description = 'Lembaga Pelatihan Kerja ke Jepang No 1 di Indonesia',
                  $keywords = "",
                  $author = 'Renggani Karya Semesta',
                  $title = null,
                  $image = null,
                  $icon = null,
                  $url = null
         ) {
                  if ($url == null) {
                           $url = url()->full();
                  }
                  $this->description = $description;
                  $this->keywords = $keywords;
                  $this->author = $author;
                  $this->title = $title;
                  $this->image = $image;
                  $this->url = $url;
                  $this->icon = $icon;
         }

         public function render()
         {
                  $view = view(
                           'components.meta',
                           [
                                    'description' => $this->description,
                                    'keywords' => $this->keywords,
                                    'author' => $this->author,
                                    'title' => $this->title,
                                    'image' => $this->image,
                                    'url' => $this->url,
                                    'icon' => $this->icon
                           ]
                  );
                  return $view->render();
         }
}
<?php
 /**
  * @file
  * Contains \Drupal\newnodes\Controller\NewNodesController.
  * ^ Пишется по следующему типу:
  *  - \Drupal - это указывает что данный файл относится к ядру Drupal, ведь
  *    теперь там еще есть Symfony.
  *  - helloworld - название модуля.
  *  - Controller - тип файла. Папка src опускается всегда.
  *  - HelloWorldController - название нашего класса.
  */
  namespace Drupal\newnodes\Controller;
  use Drupal\Core\Controller\ControllerBase;
  use Drupal\node\Entity\Node;

  class NewNodesController extends ControllerBase{
    public function newnodes(){
        $output = array();
        $output['#title'] = 'HelloWorld page title';
        $output['#markup'] = 'Hello World!';

        // for($i=0;$i<100;$i++){
        //     $node = Node::create([
        //         'type' => 'news',
        //         'title' => 'Новость'.$i,
        //         'status'=> 1,
        //         'field_category'=>4,
        //         'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit error dolore ab, numquam quos reiciendis obcaecati tenetur accusantium optio atque deleniti nesciunt porro rerum nulla vel qui ut explicabo velit?',
        //       ]);
        //       $node->save();
        //     $node = Node::create([
        //         'type' => 'news',
        //         'title' => 'Катаклизм'.$i,
        //         'status'=> 1,
        //         'field_category'=>6,
        //         'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit error dolore ab, numquam quos reiciendis obcaecati tenetur accusantium optio atque deleniti nesciunt porro rerum nulla vel qui ut explicabo velit?',
        //       ]);
        //       $node->save();
        //     $node = Node::create([
        //         'type' => 'news',
        //         'title' => 'Поисшествие'.$i,
        //         'status'=> 1,
        //         'field_category'=>5,
        //         'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit error dolore ab, numquam quos reiciendis obcaecati tenetur accusantium optio atque deleniti nesciunt porro rerum nulla vel qui ut explicabo velit?',
        //       ]);
        //       $node->save();
              
        // }
        

        return $output;
    } 
  }

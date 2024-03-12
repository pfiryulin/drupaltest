<?php
/**
  *
  */
  namespace Drupal\queryapi\Controller;
  use Drupal\Core\Controller\ControllerBase;
  Use Drupal\node\Entity\Node;

  class QueryApiController extends ControllerBase{
    function queryBase(){
        $output = array();
        // $output['#title'] = '';
        
        
       
      if(isset($_GET)){
       
        if((isset($_GET['category']) && $_GET['category'] !='all') && !isset($_GET['date'])){
            $category = $_GET['category'];
            $query = \Drupal::database()->select('node_field_data', 'n');
            $query->innerJoin('node__field_category', 'cat', 'n.nid = cat.entity_id');
            $query->condition('cat.field_category_target_id', $category);

            $query->innerJoin('taxonomy_term_field_data', 'termdata', 'termdata.tid ='.$category);
            $query->innerJoin('node__body', 'body', 'n.nid = body.entity_id');
            $query->innerJoin('node__field_data_sobytiya', 'data', 'n.nid = data.entity_id');
            
            
            $query->fields('n', ['nid', 'title']);
            $query->fields('termdata', ['name']);
            $query->fields('body', ['body_value']);
            $query->fields('data', ['field_data_sobytiya_value']);

            $nodes = $query->execute()->fetchAll();
        }
        elseif((isset($_GET['category']) && $_GET['category'] =='all') && !isset($_GET['date'])){
            $query = \Drupal::database()->select('node_field_data', 'n');
            $query->innerJoin('node__field_category', 'cat', 'n.nid = cat.entity_id');
            $query->innerJoin('taxonomy_term_field_data', 'termdata', 'termdata.tid =cat.field_category_target_id');
            $query->innerJoin('node__body', 'body', 'n.nid = body.entity_id');
            $query->innerJoin('node__field_data_sobytiya', 'data', 'n.nid = data.entity_id');
            
            $query->fields('n', ['nid', 'title']);
            $query->fields('termdata', ['name']);
            $query->fields('body', ['body_value']);
            $query->fields('data', ['field_data_sobytiya_value']);
            $nodes = $query->execute()->fetchAll();
        }
        elseif((isset($_GET['category']) && $_GET['category'] !='all') && (isset($_GET['date']))){
            $category = $_GET['category'];
            $date = '%'.$_GET['date'].'%';
            $query = \Drupal::database()->select('node_field_data', 'n');
            $query->innerJoin('node__field_category', 'cat', 'n.nid = cat.entity_id');
            $query->condition('cat.field_category_target_id', $category);
            $query->innerJoin('node__field_data_sobytiya', 'data', 'n.nid = data.entity_id');
            $query->condition('data.field_data_sobytiya_value', $date, 'LIKE');

            $query->innerJoin('taxonomy_term_field_data', 'termdata', 'termdata.tid ='.$category);
            $query->innerJoin('node__body', 'body', 'n.nid = body.entity_id');
            $query->fields('n', ['nid', 'title']);
            $query->fields('termdata', ['name']);
            $query->fields('body', ['body_value']);
            $query->fields('data', ['field_data_sobytiya_value']);
            $nodes = $query->execute()->fetchAll();
        }
        elseif((isset($_GET['category']) && $_GET['category'] =='all') && (isset($_GET['date']))){
            $date = '%'.$_GET['date'].'%';
            $query = \Drupal::database()->select('node_field_data', 'n');
            $query->innerJoin('node__field_category', 'cat', 'n.nid = cat.entity_id');
            $query->innerJoin('node__field_data_sobytiya', 'data', 'n.nid = data.entity_id');
            $query->condition('data.field_data_sobytiya_value', $date, 'LIKE');

            $query->innerJoin('taxonomy_term_field_data', 'termdata', 'termdata.tid =cat.field_category_target_id');
            $query->innerJoin('node__body', 'body', 'n.nid = body.entity_id');
            $query->fields('n', ['nid', 'title']);
            $query->fields('termdata', ['name']);
            $query->fields('body', ['body_value']);
            $query->fields('data', ['field_data_sobytiya_value']);
            $nodes = $query->execute()->fetchAll();
        }elseif(isset($_GET['getcategory'])){
          $query = \Drupal::database()->select('taxonomy_term_field_data','termdata');
          $query->fields('termdata', ['tid','name']);
          $nodes = $query->execute()->fetchAll();
        }
        else{
            echo 'неверный запрос, пустые параметры';
        }

        if(isset($nodes) && count($nodes)>0){
          // $output['#title'] = json_encode($nodes);
            echo json_encode($nodes);
            // $output['#json']= json_encode($nodes);
        }
        // else{
        //   return $output;
        // }
        // return $output;
        // return json_encode($nodes);
        
      }
      
    } 
    
  }
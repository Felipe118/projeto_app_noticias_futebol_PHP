<?php 
   

   namespace App\Controllers; 
   

   //os recursos do miniframework
   use MF\Controller\Action;
   use MF\Model\Container;
  
   class NoticiasController extends Action{
    public function cadastra_noticias(){
        session_start();

        if($_SESSION['autenticado'] == false){
          header('Location: /'); 
        }
        $this->renderNoticias('cadastra_noticias_adm');
    } 
    
    public function alterar_index(){
   
      $this->renderNoticias('alterar_noticias_adm');
    }
    public function listar_noticias_adm(){
      session_start();
      $noticia = Container::getModel('Noticia');
      

      $noticia->__set('fk_id_funcionario',$_SESSION['id']);
      $noticias = $noticia->listar();
      //var_dump($_SESSION['id']);
      $this->view->noticias = $noticias;
      $this->renderNoticias('listar_noticias_adm');


    }
    public function cadastrarNoticia(){

     // echo '<pre>';
       // print_r($_POST);
        //echo '</pre>';

      //session_start();
        
      //$noticias = Container::getModel('Noticia');

        
      // $noticias->__set('titulo', $_POST["titulo"]);
      // $noticias->__set('resumo', $_POST["resumo"]);
      // $noticias->__set('texto', $_POST["texto"]);
      // $noticias->__set('imagem', $_POST["imagem"]);
      // $noticias->__set('autor', $_POST["autor"]);
      // $noticias->__set('fk_id_funcionario', $_SESSION['id'] );
        
         //$noticias->cadastrar();
 

       // header('Location: /cadastra_noticias?inserido=sucesso');
        //$this->renderNoticias('cadastra_noticias');
      
} 
    public function teste(){
      session_start();
      try{


     
      $teste = Container::getModel('Teste');
    
       // $_POST['id'] = $_SESSION['id'];
       
      $teste->__set('id', (integer)$_SESSION['id']);
      var_dump($_SESSION['id']);
    
      $teste->__set('titulo', $_POST["titulo"]);

      if($teste->teste()){
        $this->renderNoticias('cadastra_noticias');
      }
      }catch(\PDOException $e){
        echo 'ERRO'.$e->getMessage();
      }
    }
}
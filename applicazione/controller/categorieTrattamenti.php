<?php
function salvaCategoriaTrattamenti(){
    $id= getRequest("idCategoriaTrattamenti");
    
    $nomeCategoriaTrattamenti = getRequest("nomeCategoriaTrattamenti");
    
    
    $categoria = new CategorieTattamenti();
    
    $categoria->categoria = $nomeCategoriaTrattamenti;
    
    
    if (!isBlankOrNull($id)){
        $categoria->id=$id;
        DAOFactory::getCategorieTattamentiDAO()->update($categoria);
        
    }  else {
        DAOFactory::getCategorieTattamentiDAO()->insert($categoria);
        
    }
    
    ob_clean();
    header("location: index.php?action=categorieList");
    exit;
}

function caricaCategoriaTrattamento(){
    global $categoriaTrattamento;
    
    $id = getRequest("id");
    
    $categoriaTrattamento = DAOFactory::getCategorieTattamentiDAO()->load($id);
    
}



function caricaListaCategorie(){
    global $listaCategorieTrattamenti;
    
    $listaCategorieTrattamenti = DAOFactory::getCategorieTattamentiDAO()->queryAll();
    
}

function eliminaCategoria(){
    $id = getRequest("id");
    
    DAOFactory::getCategorieTattamentiDAO()->delete($id);
    
    ob_clean();
    header("location: index.php?action=categorieList");
    exit;
    
}
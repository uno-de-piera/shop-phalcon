<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$this->view->products = array(
    		array(
    			"id"			=>		1,
    			"name"			=>		"Collar",
    			"price"			=>		15.2,
    			"description"	=>		"Collar para perros"
    		),
    		array(
    			"id"			=>		2,
    			"name"			=>		"Galleta",
    			"price"			=>		2.1,
    			"description"	=>		"Galletas de perros"
    		),
    		array(
    			"id"			=>		3,
    			"name"			=>		"Pienso",
    			"price"			=>		3.32,
    			"description"	=>		"Pienso para perros"
    		),
    		array(
    			"id"			=>		4,
    			"name"			=>		"Correa",
    			"price"			=>		4.25,
    			"description"	=>		"Correas para perros"
    		),
    		array(
    			"id"			=>		5,
    			"name"			=>		"Pecera",
    			"price"			=>		49.99,
    			"description"	=>		"Peceras para peces :)",
    			"options"		=>		array("Grande", "Mediana", "Pequeña")
    		),
    		array(
    			"id"			=>		6,
    			"name"			=>		"Casetas",
    			"price"			=>		99.99,
    			"description"	=>		"Casetas de varios colores",
    			"colores"		=>		array("negro", "azul", "rojo")
    		)
    	);

    	$this->view->cartContent = new ShoppingCart("pets");

    }

    public function perfumesAction()
    {
    	$this->view->products = array(
    		array(
    			"id"			=>		1,
    			"name"			=>		"Adolfo Dominguez",
    			"price"			=>		15.2,
    			"description"	=>		"Adolfo Dominguez AGUA FRESCA"
    		),
    		array(
    			"id"			=>		2,
    			"name"			=>		"Adolfo Dominguez",
    			"price"			=>		20,
    			"description"	=>		"VIAJE A CEYLAN "
    		),
    		array(
    			"id"			=>		3,
    			"name"			=>		"Adolfo Dominguez",
    			"price"			=>		15.50,
    			"description"	=>		"BAMBU"
    		),
    		array(
    			"id"			=>		4,
    			"name"			=>		"Adolfo Dominguez",
    			"price"			=>		19.25,
    			"description"	=>		"U BLUE MAN"
    		),
    		array(
    			"id"			=>		5,
    			"name"			=>		"Adolfo Dominguez",
    			"price"			=>		49.99,
    			"description"	=>		"VETIVER HOMBRE"
    		),
    		array(
    			"id"			=>		6,
    			"name"			=>		"Adolfo Dominguez",
    			"price"			=>		39.99,
    			"description"	=>		"U MAN"
    		)
    	);

    	$this->view->cartContent = new ShoppingCart("perfumes");

    }

    public function superAction()
    {
    	$this->view->products = array(
    		array(
    			"id"			=>		1,
    			"name"			=>		"Almendras",
    			"price"			=>		2.5,
    			"description"	=>		"Almendras saladas"
    		),
    		array(
    			"id"			=>		2,
    			"name"			=>		"Galletas pou",
    			"price"			=>		2.7,
    			"description"	=>		"Galletas del amigo pou"
    		),
    		array(
    			"id"			=>		3,
    			"name"			=>		"Pasta de dientes",
    			"price"			=>		1.80,
    			"description"	=>		"Pasta de dientes......"
    		),
    		array(
    			"id"			=>		4,
    			"name"			=>		"Detergente",
    			"price"			=>		5,
    			"description"	=>		"Detergente marca blanca"
    		),
    		array(
    			"id"			=>		5,
    			"name"			=>		"Cola",
    			"price"			=>		49.99,
    			"description"	=>		"Refresco cola"
    		),
    		array(
    			"id"			=>		6,
    			"name"			=>		"Jamón",
    			"price"			=>		99.99,
    			"description"	=>		"Jamón....."
    		)
    	);

    	$this->view->cartContent = new ShoppingCart("super");

    }

    public function addAction()
    {
    	if($this->request->isPost())
    	{
    		$this->view->disable();

	    	$cart = new ShoppingCart($this->request->getPost("cartName"));

	    	$product = array(
	    			"id"		=>		intval($this->request->getPost("id")),
	    			"name"		=>		(string)$this->request->getPost("name"),
	    			"price"		=>		floatval($this->request->getPost("price")),
	    			"qty"		=>		intval($this->request->getPost("qty")),
	    			"desc"		=>		(string)$this->request->getPost("description")
	    			//"options"	=>		array("color" => "azul", "talla" => "XXL")
	    	);

	    	if($this->request->getPost("colores"))
	    	{
	    		$product["options"] = (string)$this->request->getPost("colores");
	    	}

	    	if($cart->add($product) != false)
	    	{
	    		$this->flashSession->success("Producto añadido correctamente!");
	    	}
	    	else
	    	{
	    		$this->flashSession->error("Error añadiendo el producto!");
	    	}

	    	$this->_previousPage();
    	}
    }

    public function homeAction()
    {
    	$this->view->disable();

    	$cart = new ShoppingCart("pets");

    	$product = array(
    			"id"		=>		30,
    			"name"		=>		"collar",
    			"price"		=>		15,
    			"qty"		=>		20,
    			//"options"	=>		array("color" => "azul", "talla" => "XXL")
    	);

    	//$cart->add($product);
    	/*foreach($cart->getContent() as $item)
    	{
    		echo $item["name"], "<br>";
    	}*/
    	echo "<pre>";
    	var_dump($cart->getContent());

    	echo $cart->getTotal(), "<br>";
    	echo $cart->getTotalItems();
    }

    public function addMultipleAction()
    {
    	$this->view->disable();

    	$cart = new ShoppingCart("animales");

    	$products = array(
    		array(
    			"id"		=>		33,
    			"name"		=>		"collar",
    			"price"		=>		10,
    			"qty"		=>		10,
    			"options"	=>		array("color" => "negro", "talla" => "XXL")
    		),
    		array(
    			"id"		=>		34,
    			"name"		=>		"correa",
    			"price"		=>		15,
    			"qty"		=>		35,
    			"options"	=>		array("color" => "rojo")
    		)
    	);

    	$cart->addMulti($products);
    	/*foreach($cart->getContent() as $item)
    	{
    		echo $item["name"], "<br>";
    	}*/
    	echo "<pre>";
    	var_dump($cart->getContent());
    }

    public function updateAction()
    {
    	$this->view->disable();
    	$cart = new ShoppingCart("pets");
    	$product = array(
			"id"			=>		6,
			"name"			=>		"Casetas",
			"price"			=>		80,
			"description"	=>		"Casetas para perros de varios colores",
			"qty"			=>		1
		);
    	$cart->update($product);
    	echo "<pre>";
    	var_dump($cart->getContent());
    	echo $cart->getTotal(), "<br>";
    	echo $cart->getTotalItems();
    }

    public function removeAction($rowId, $cartName)
    {
    	$this->view->disable();
    	$cart = new ShoppingCart($cartName);
    	if($cart->removeProduct($rowId) != false)
    	{
    		$this->flashSession->error("Producto eliminado");
    	}
	    $this->_previousPage();
    }

    public function removeCartAction($cartName)
    {
    	$this->view->disable();
    	$cart = new ShoppingCart($cartName);
    	if($cart->destroy() != false)
    	{
    		$this->flashSession->error("Carrito eliminado");
    	}
    	$this->_previousPage();
    }

    public function checkOptionsAction()
    {
    	$this->view->disable();
    	$cart = new ShoppingCart("animales");
    	echo $cart->has_options("62b3b27195c462e15430389f0162bd29");
    }

    private function _previousPage()
    {
    	$this->view->disable();
    	//obtenemos la variable HTTP_REFERER
	    $referer = $this->request->getHTTPReferer();
    	//si existe la variable HTTP_REFERER redirigimos a la url anterior
	    if(strpos($referer, $this->request->getHttpHost()."/")!==false) 
	    {
	        return $this->response->setHeader("Location", $referer);
	    } 
	    //en otro caso mostramos el contenido de la acción index del controlador index
	    else 
	    {
	        return $this->dispatcher->forward(array('controller' => 'index', 'action' => 'index'));
	    }
    }
}


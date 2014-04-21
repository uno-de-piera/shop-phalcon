<div class="row">
	<h1 class="text-center">Perfumes</h1>
	<hr>
	<div class="clear-fix"></div>
    <div class="col-md-4">
    	<ul class="nav nav-pills">
            <li>
                <a href="<?php echo $this->url->get("") ?>" class="list-group-item">Mascotas</a>
            </li>
            <li>
                <a href="<?php echo $this->url->get("index/perfumes") ?>" class="list-group-item active">Perfumes</a>
            </li>
            <li>
                <a href="<?php echo $this->url->get("index/super") ?>" class="list-group-item">Supermercado</a>
            </li>
        </ul>
        <hr>
        <div class="clear-fix"></div>
        <p class="lead">Content Cart</p>
        <?php $this->flashSession->output() ?>
        <?php
        if($cartContent->getContent() != NULL)
        {
        ?>
        <table class="table table-bordered table-hover table-condensed table-striped">
	        <thead>
	        	<tr>
	        		<th>Name</th>
	        		<th>Qty</th>
	        		<th>Price</th>
	        		<th>Options</th>
	        		<th>Total</th>
	        		<th>Remove</th>
	        	</tr>
	        </thead>
        	<tbody>
        <?php
        	foreach($cartContent->getContent() as $content)
        	{
        	?>
        		<tr>
	        		<td><?php echo $content["name"] ?></td>
	        		<td><?php echo $content["qty"] ?></td>
	        		<td><?php echo $content["price"] ?></td>
	        		<td>
	        			<?php if(isset($content["options"])) { ?>
	        				<span class="glyphicon glyphicon-info-sign" 
					        data-toggle="popover" 
					        data-content="Color: <?php echo $content['options'] ?>">
					        </span>
	        			<?php } ?>
	        		</td>
	        		<td><?php echo $content["total"] ?></td>
	        		<td>
	        			<a href="<?php echo $this->url->get("index/remove/".$content['rowId'])."/perfumes" ?>" class="btn btn-danger btn-xs">
	        				<span class="glyphicon glyphicon-remove"></span>&nbsp;Remove</a>
	        		</td>
	        	</tr>
        	<?php
        	}
        ?>
                <tr>
                    <td colspan="6">
                    <b>Total items: <?php echo $cartContent->getTotalItems() ?></b>
                    </td>
                </tr>
        		<tr>
        			<td colspan="6">
        			<b>Total price cart: €<?php echo $cartContent->getTotal() ?></b>
        			</td>
        		</tr>
        	</tbody>
        </table>
        <hr>
        <!--link para eliminar el carrito de las mascotas-->
        <a href="<?php echo $this->url->get("index/removeCart/perfumes") ?>" 
        class="btn btn-danger btn-block"><span class="glyphicon glyphicon-remove">&nbsp;</span>Destroy Cart</a>
        <?php
        }
        else
        {
        ?>
        <p class="alert alert-info">The cart is empty!</p>
        <?php
        }
        ?>
    </div>

    <div class="col-md-8">

        <div class="row">

        <?php foreach($products as $product)
        {
        ?>
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="<?php echo $this->url->get("img/perfumes.jpg") ?>" alt="">
                    <div class="caption">
                        <h4 class="pull-right">€<?php echo $product["price"] ?></h4>
                        <h4><a href="#"><?php echo $product["name"] ?></a>
                        </h4>
                        <p><?php echo $product["description"] ?></p>
                        <?php echo $this->tag->form(array("index/add", "method" => "post")) ?>
	                    	<input type="hidden" name="<?php echo $this->security->getTokenKey() ?>"
	                		value="<?php echo $this->security->getToken() ?>"/>
	                		<input type="hidden" name="name" value="<?php echo $product["name"] ?>">
	                		<input type="hidden" name="id" value="<?php echo $product["id"] ?>">
	                		<input type="hidden" name="price" value="<?php echo $product["price"] ?>">
                            <input type="hidden" name="cartName" value="perfumes">
	                		<input type="hidden" name="description" value="<?php echo $product["description"] ?>">
	                		<label>Cantidad: </label>
	                		<select name="qty">
	                			<option value="1">1</option>
	                			<option value="2">2</option>
	                			<option value="3">3</option>
	                			<option value="4">4</option>
	                			<option value="5">5</option>
	                		</select><br>
	                		<?php if(isset($product["colores"])) { ?>
	                			<label>Color: </label>
	                			<select name="colores">
	                			<?php
	                			foreach($product["colores"] as $color)
	                			{
	                			?>
	                				<option value="<?php echo $color ?>"><?php echo $color ?></option>
	                			<?php
	                			}
	                			?>
	                			</select>
	                		<?php } ?>
	                		<button type="submit" class="btn btn-success btn-block">
	                			<span class="glyphicon glyphicon-shopping-cart"></span>
	                			Add
	                		</button>
	                    <?php echo $this->tag->endForm() ?>
	                </div>
                </div>
            </div> 
        <?php
    	}
    	?>
        </div>
    </div>
</div>
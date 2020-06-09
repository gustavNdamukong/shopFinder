<?php
//namespace controllers;

/*
// create database connection
$conn = dbConnect('allcam');
// initialize statement
$stmt = $conn->stmt_init();

//MAKE SURE YOU ESTABLISH WHAT LANGUAGE TO USE ON THE SITE HERE, AS THIS SHOULD DETERMINE HOW YOU QUERY THE DB BELOW
//$lang = GlobalTransGarrison::sidebarCategories();
$lang = GlobalTransGarrison::sidebarCategories();
//echo $_SESSION['lang'];
//die("$lang");

//get categories
$getCats = "SELECT id, name$lang
FROM product_categories
WHERE parent_id = '0'
ORDER BY name$lang";
$categories = $conn->query($getCats);



// get locations
$getLocs = "SELECT *
FROM locations";
//ORDER BY 'town'";
$locations = $conn->query($getLocs);
*/

?>

    <form id="search_form" method="get" action="">
        <div id="search_box" class="panel"><!--CHANGED THIS TO A PANEL TO SEE HOW IT WOULD LOOK -->


        <div class="panel-heading">
                <span class="glyphicon glyphicon-search" style="color: white;"></span><h3 class="panel-title">Search<?php //echo GlobalTransGarrison::searchBoxHeading(); ?></h3>
        </div>

        <div class="panel-body">
            <label for="prod_cats"><?php //echo GlobalTransGarrison::searchCatLabel(); ?></label>
            <select class="form-control" name="prod_cats"  id="prod_cats">
               <option value=""><?php //echo GlobalTransGarrison::searchCatSelectoption(); ?></option>
               <option value="all categories"><?php //echo GlobalTransGarrison::searchCatAllOption(); ?></option>


            <?php
            /*
            $cats = array();

            while ($row_cats = $categories->fetch_assoc())
            {
                    $cats[] = $row_cats["name$lang"];
                ?>
                <option value="<?php echo "$row_cats[id]"; ?>"><?php echo ucfirst($row_cats["name$lang"]); ?></option>
                <?php

            }
                */ ?>
            </select>
            <br />


            <label for="search_keyword"><?php //echo GlobalTransGarrison::searchKeywordLabel(); ?></label>
            <input class="form-control" id="search_keyword" type="text" name="search_keyword" />



            <label for="prod_loc">Location:</label>
            <select class="form-control" name="prod_loc" id="prod_loc">

               <option value=""><?php //echo GlobalTransGarrison::searchTownSelectoption(); ?></option>
               <option value="all towns"><?php //echo GlobalTransGarrison::searchTownAllOption(); ?></option>


            <?php
            /*
            while ($row_locs = $locations->fetch_assoc())
            { ?>
                <option value="<?php echo "$row_locs[loc_town]"; ?>"><?php echo ucfirst("$row_locs[loc_town]"); ?></option>
            <?php
            }
            */?>
            </select>
        </div><!--END OF PANEL BODY-->

        <div class="panel-footer">
            <!--[if IE 7]><span class="button-ie7-wrapper secondary small  "><![endif]-->
            <input id="search_button" type="submit" name="search_button_submit"  class="btn btn-primary" value="Go<?php //echo GlobalTransGarrison::searchBoxButtonText(); ?>" />
            <!--[if IE 7]></span><![endif]-->

        </div>
        </div><!--END OF SEARCH PANEL-->
    </form>
   

<?php
/*
		foreach( $cats as $cat) 
		{ 
			echo '<p>'.ucfirst("$cat").'</p>';
            echo '<hr />';
		}
*/?>
<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Shop_image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShopsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Show the manage shops page to the admin user.
     *
     * @return Response
     */
    public function index()
    {
        //here we get all the existing shops to display on the admin home page when an admin person is logged in
        //However, only super-admin users are allowed to edit/delete all shops regardless of the creator, but admin users are allowed to edit/delete shops
        //created by them. We therefore need to check what type of admin this user is and if they're an admin we'll grab and show them only their shops
        $shop = new Shop();

        if (Auth::user()->hasRole('super-admin'))
        {
            // but first convert the collection into an array
            //$shops = $shop::all()->toArray(); //decided to keep this as an obj so i could use LV's paginator, wh only works with objects
            $shops = $shop->getPaginated();
        }
        else
        {
            $shops = $shop::where('user_id', '=', Auth::user()->id)->paginate();
        }

        return view('admin.shops.admin_shops')->with('shops', $shops);
    }






    public function create()
    {
        return view('admin.shops.create_shop');
    }




    public function saveShop(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'address' => 'required|string',
            'description' => 'required',
            'postcode' => 'required',
            'lat' => 'required',
            'lon' => 'required',
        ]);

        //validation was successful

        //save the shop to DB and get its ID
        $shop = new Shop;

        $shop->name = $request->name;
        $shop->city = $request->city;
        $shop->address = $request->address;
        $shop->description = $request->description;
        $shop->postcode = $request->postcode;
        $shop->lat = $request->lat;
        $shop->lon = $request->lon;
        $shop->user_id = $request->user_id;

        $saved = $shop->save();

        if ($saved) {
            $shop_id = $shop->id;

            //If there are images; rename them,
            // save their names to DB and
            //upload them to filesystem
            if ($request->hasFile('fileUpload')) {
                //Specify file upload path
                $destinationPath = 'images/store_imgs';

                foreach ($request->fileUpload as $file) {

                    // get the image extension
                    $extension = $file->getClientOriginalExtension();

                    // rename the image
                    $filename = rand(11111,99999).'.'.$extension;

                    //save the filename to DB
                    DB::table('shop_images')->insert(array('shop_id' => $shop_id, 'image_name' => $filename));

                    //TODO: Implement image resizing before uploading
                    // move the newly uploaded file to the upload path
                    $file->move($destinationPath, $filename);
                }
            }

            //done
            flash("The shop {$request->name} was created successfully")->success();
            return redirect('admin/shops');

        }
    }







    public function showEdit($shopId)
    {
        //here we get the details of the given shop to display
        //TODO: Come back and use an Eloquent join for this query and group by shop images so you dont have to fetch the images separately
        //TODO: This will also make sure the query is secure as Eloquent uses PDO and the DB facade doesn't
        //TODO: Also, how do u query a one-to-many or many-to-many relationship so that you get one result on one side with many on the other?
        //This is a super-admin user so query away
        $shop = DB::select(DB::raw("select s.id, s.name, s.city, s.postcode, s.lat, s.lon, s.address, s.user_id, s.description, u.name as created_by, si.id as image_id, si.image_name
            from shops s
            left join users u
            on s.user_id = u.id	
            left join shop_images si
            on s.id = si.shop_id
            where s.id = $shopId"));

        //get the shop images into a separate array, this is coz the same shop rec was repeated for every shop image
        $shopImages = [];
        if (count($shop) >= 1) {
            foreach ($shop as $sho) {
                $shopImages[$sho->image_id] = $sho->image_name;
            }
            //die('WITH IMAGES '.print_r($shop));


        }
        return view('admin.shops.edit_shop')->with(['shop' => $shop[0], 'shopImages' => $shopImages]);
    }






    public function deleteShopImgAjaxPost(Request $request)
    {
        $imageName = $request->imageName;
        $destinationPath = 'images/store_imgs';

        //Delete img from the DB and from filesystem
        Shop_image::where('id', $request->imageId)->delete();
        unlink($destinationPath.'/'.$imageName);
        exit('done');
    }





    /*
     * Update a shop's data. Note that while we upload any new images submitted, we do not remove any prev images
     * as we already have another method to remove individual messages (deleteShopImgAjaxPost())
     *
     */
    public function update(Request $request)
    {
        //Update the shop
        $shop = new Shop();
        $affectedRows = $shop::where('id', '=', $request->shopId)->update([
            'name' => $request->name,
            'city' => $request->city,
            'address' => $request->address,
            'description' => $request->description,
            'postcode' => $request->postcode,
            'lat' => $request->lat,
            'lon' => $request->lon,
        ]);


        //Insert the images into the DB,
        //but first, remove the prev images
        if ($request->hasFile('fileUpload')) {
            //Specify file upload path
            $destinationPath = 'images/store_imgs';

            // rename the file,
            // Insert the new images in DB &
            // move the file to upload path
            foreach ($request->fileUpload as $file) {

                // get the image extension
                $extension = $file->getClientOriginalExtension();

                // rename the image
                $filename = rand(11111,99999).'.'.$extension;

                //save the filename to DB
                DB::table('shop_images')->insert(array('shop_id' => $request->shopId, 'image_name' => $filename));

                //TODO: Implement image resizing before uploading
                // move the newly uploaded file to the upload path
                $file->move($destinationPath, $filename);
                /////$file->store('store_images', 'public');
            }
        }

        flash('The shop was updated successfully')->success();
        return redirect('admin/shops');
    }






    public function destroy(Shop $shop)
    {
        //Grab all names of imgs of this shop
        $images = Shop_image::select('image_name')
            ->where('shop_id', '=', $shop->id)
            ->get()->toArray();

        //If any images, remove the imgs from the DB and from filesystem
        if (!empty($images)) {
            $destinationPath = 'images/store_imgs';
            foreach ($images as $image) {
                unlink($destinationPath . '/' . $image['image_name']);
                Shop_image::where('shop_id', $shop->id)->delete();
            }
        }

        //delete the shop
        $shop->delete();

        flash('The shop was deleted successfully')->success();
        return redirect('admin/shops');
    }


}

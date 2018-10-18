<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller {

     function DOMinnerHTML(\DOMElement $element) {
        $innerHTML = "";

        $children = $element->childNodes;


        foreach ($children as $child) {
            $innerHTML .= $element->ownerDocument->saveHTML($child);
        }

        return $innerHTML;
    }

    public function showIndexPage() {
        $data = $this->retrieveRecommendedProductList(4);

        $user = $this->checkUserLogin();

        $data['user'] = $user;

        return View::make('test', compact('data'));
    }


    public function showYahooAuctionPage() {

        //Retrieve most recent news
        //**********************To Do *******************//

        // Retrieve Recommended Product List
        // List need to be 12 items
        $data = $this->retrieveRecommendedProductList(12);

        $user = $this->checkUserLogin();

        $data['user'] = $user;

        //return $this->retrieveRecommendedProducts(12);
    }


    public function showYahooShoppingPage() {
        $data = $this->retrieveYahooShoppingItemList('dj00aiZpPUZ0eUdjMUk0RW9hZiZzPWNvbnN1bWVyc2VjcmV0Jng9MTA-', 'a', 'any', '20', '0', 'name');

        $user = $this->checkUserLogin();

        $data['user'] = $user;

    }

    public function showBrowsePage($platform = 1, $category = 0) {
         // determine which banner to use according to routing
        /*
        $img_src = "";

        switch($platform) {
            case 1:
                $img_src = "";
                break;
            case 2:
                $img_src = "";
                break;
            case 3:
                $img_src = "";
                break;
            case 4:
                $img_src = "";
                break;
            case 5:
                $img_src = "";
                break;
            case 6:
                $img_src = "";
                break;
            default:
                break;
        }
        */

        //$banner = View::make('component.banner', ['' => ]);


        return $this->retrieveSearchAPI('test', 1,5);
    }




    public function showTestPage() {
        return View::make('test');
    }

    public function testFunction() {
        //return $this->retrieveYahooShoppingItemList('dj00aiZpPUZ0eUdjMUk0RW9hZiZzPWNvbnN1bWVyc2VjcmV0Jng9MTA-', 'mac', 'any', 50, 0, 'name');
        //return $this->retrieveYahooShoppingItemInfo('dj00aiZpPUZ0eUdjMUk0RW9hZiZzPWNvbnN1bWVyc2VjcmV0Jng9MTA-','vestashop1_Office-2016-MAC');
        //return $this->retrieveRakutenProductList('1014199636902969211', '', 'mac',30, 1, 'standard');
        //return $this->retrieveRakutenProductInfo('1014199636902969211', 'lunadea:10004169');

        /*
        require_once (public_path()."/phpGrid_Lite/conf.php");

        $dg = new \C_DataGrid("SELECT * FROM Orders", "OrderID", "Orders");
        $dg->enable_edit("FORM", "CRUD");
        $dg->enable_autowidth(true)->enable_autoheight(true);
        $dg->set_theme('start');
        $dg->set_grid_property(array('cmTemplate'=>array('title'=>false)));
        $dg->display(false);

        $grid = $dg -> get_display(true);

        return view('dashboard', ['grid' => $grid]);
        */
    }

    //************************************** Private Function **************************************//
    private function retrieveYahooAuctionItemList() {
        $url = '';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);
    }

    private function retrieveYahooAuctionItemInfo() {

    }

    private function checkUserLogin() {
        if (Auth::check()) {
            $storedUser = Auth::user();
            $userInfo = DB::select("SELECT first_name FROM UserInfos WHERE email = '".$storedUser->email."';");
            $user = array(['isLoggedIn' => true, 'firstName' => $userInfo[0]->first_name, 'email' => $storedUser->email]);
        } else {
            $user = array(['isLoggedIn' => false]);
        }

        return $user;
    }

    // Retrieve Yahoo Shopping Item List.
    private function retrieveYahooShoppingItemList($appid, $query, $type, $size, $offset, $sort) {
        $url = 'https://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?';
        $url .= 'appid='.$appid;
        $url .= '&query='.$query;
        $url .= '&type='.$type;
        //$url .= '&hits='.$size;
        //$url .= '&offset='.$offset;
        //$url .= '&sort='.$sort;

        $response = $this->getAPIResponse($url);

        $xml = simplexml_load_string($response);

        $productList = array();

        foreach ($xml->Result->Hit as $item) {
            $tempProduct = array();

            $tempProduct['itemName'] = $item->Name;
            $tempProduct['itemCode'] = $item->Code;
            $tempProduct['itemURL'] = $item->Url;
            $tempProduct['itemImageURL'] = $item->Image->Medium;
            $tempProduct['itemPrice'] = $item->Price;

            array_push($productList, $tempProduct);
        }

        $data['productList'] = $productList;

        return $data;
    }


    // Retrieve Yahoo Shopping Item Information.
    private function retrieveYahooShoppingItemInfo($appid, $itemcode) {
        $url = 'https://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?';
        $url .= "appid=".$appid;
        $url .= "&itemcode=".$itemcode;
        $url .= "&responsegroup=medium";

        $response = $this->getAPIResponse($url);

        $xml = simplexml_load_string($response);



        $tempProduct = array();

        $item = $xml->Result->Hit;

        $tempProduct['itemName'] = $item->Name;
        $tempProduct['itemDescription'] = $item->Description;
        $tempProduct['itemCondition'] = $item->Condition;
        $tempProduct['itemYenPrice'] = $item->Price * 1;
        $tempProduct['itemHKDPrice'] = $item->Price * 0.07;
        $tempProduct['itemURL'] = $item->Url;
        $tempProduct['itemReleaseDate'] = $item->ReleaseDate;
        $tempProduct['itemImageURL'] = $item->Image->Medium;
        $tempProduct['itemReviewRate'] = $item->Review->Rate;
        $tempProduct['itemReviewCount'] = $item->Review->Count;


        $data['product'] = $tempProduct;

        return $data;
    }

    /**
     *
     */
    private function retrieveRakutenProductList($appid, $genreid, $keyword, $hitsPerPage, $page, $sort) {

        $url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?';
        $url .= "&applicationId=".$appid;
        $url .= "&formatVersion=2&";

        if ($genreid != '') {
            $url .= "genreId=".$genreid;
        } else {
            $url .= "keyword=".$keyword;
        }

        $url .= "&hits=".$hitsPerPage;
        $url .= "&page=".$page;
        $url .= "&sort=".$sort;

        $response = $this->getAPIResponse($url);

        $response = json_decode($response, true);


        $data = array();
        $product_list = array();
        foreach ($response['Items'] as $item) {
            $tempProduct = array();

            $tempProduct['itemName'] = $item['itemName'];
            $tempProduct['itemCode'] = $item['itemCode'];
            $tempProduct['itemURL'] = $item['itemUrl'];
            $tempProduct['itemImageURL'] = $item['mediumImageUrls'][0];
            $tempProduct['itemPrice'] = $item['itemPrice'];

            array_push($product_list, $tempProduct);

        }

        $data['recommendedProducts'] = $product_list;

        return $data;
    }

    private function retrieveRakutenProductInfo($appid, $itemCode) {
        $url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?';
        $url .= "applicationId=".$appid;
        $url .= "&formatVersion=2&";
        $url .= "&itemCode=".$itemCode;

        $response = $this->getAPIResponse($url);
        $response = json_decode($response, true);



        return $response;
    }




    /**
     * @param $num_item
     * @return string
     */
    private function retrieveRecommendedProductList($num_item) {
        $url = 'https://auctions.yahooapis.jp/v2.1/auctions/search?ranking=popular&start=0&results='.$num_item.'&item_state=open&query=a'.
            '&appid=dj0zaiZpPTZSNEZWZ1hZTTc2TSZzPWNvbnN1bWVyc2VjcmV0Jng9NDc-&timebuf=50&image_shape=raw&fields=%3Aapp&category_id'.
            '==&query_target=%3A1&kmp=true&priority=featured&sort=end&remaining_time=%5B60%2C%5D';

        // Get response string from api.
        $response = $this->getAPIResponse($url);

        // Convert json string to json object.
        $response = json_decode($response, true);
        $responseString = "";

        $data = array();
        $recommended_product_list = array();
        foreach ($response['auctions'] as $item) {
            $product = array();

            $product['productImgURL'] = $item['images'][0]['url'];
            $product['productYenPrice'] = $item['price'];
            $product['productHKDPrice'] = $item['price'] * 0.070;
            $product['productName'] = $item['title'];


            $dateEnd = new \DateTime($item['end_time'], new \DateTimeZone('Asia/Tokyo'));
            $dateEnd->setTimezone(new \DateTimeZone('Asia/Hong_Kong'));

            $product['productTimeLeft'] = $dateEnd->format('Y年m月d日 H時i分s秒');
            array_push($recommended_product_list, $product);

            $responseString .= ",".$item['title'];
            //$responseString .= ",".$item['price'];
        }

        $data['recommendedProducts'] = $recommended_product_list;

        return $data;
    }

    private function getAPIResponse($url) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
    }

    /*
    private function retrieveRecommendedProducts($num_items) {
        $url = 'https://auctions.yahoo.co.jp/category/list/2084261633/?select=23&auccat=2084261633&exflg=1&b=1&n=100&slider=';

        $item_count = 0;

        $data = array();
        $dom = new \DOMDocument();
        $internalErrors = libxml_use_internal_errors(true);
        $dom->loadHTMLFile($url);
        libxml_use_internal_errors($internalErrors);

        $list_div = $dom->getElementById('list01');

        $table = $list_div->getElementsByTagName('table')[0];
        $row_list = $table->getElementsByTagName('td');

        $response = "";

        $recommended_product_list = array();
        $item = array();
        foreach ($row_list as $row) {
            if ($row->getAttribute("class") == "i") {
                $img = $row->getElementsByTagName('img')[0];
                $url = $img->getAttribute("src");

                $item['productImgURL'] = $url;

                $response .= $url;
                //      $response .= $row->getAttribute('class');
            } else if ($row->getAttribute("class") == "a1") {
                $name_element = $row->getElementsByTagName('a')[0];
                $name = $this->DOMinnerHTML($name_element);
                if (strpos($name, '<em>') !== false) {
                    $name = str_replace("<em>", "", $name);
                    $name = str_replace("</em>", "", $name);
                }


                $item['productName'] = $name;
                $response .= $name;


            } else if ($row->getAttribute("class") == "pr1") {
                $children = $row->childNodes;

                $item['productYenPrice'] = $children;
                $response .= $children[0]->nodeValue;
            } else if ($row->getAttribute("class") == "ti") {
                $children = $row->childNodes;

                $item['productTimeLeft'] = $children[0]->nodeValue;
                // Add item to list and clear the item array.
                array_push($recommended_product_list, $item);
                $item = array();
                $item_count++;
                if ($item_count == $num_items) {
                    break;
                }

                $response .= $children[0]->nodeValue;
            }
        }

        $data['recommendedProducts'] = $recommended_product_list;

        return $response;

    }

    */
}


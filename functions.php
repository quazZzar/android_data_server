<?php
require_once(get_template_directory() . '/tesla_framework/tesla.php');

/***********************************************************************************************/
/* Add Menus */
/***********************************************************************************************/

function tt_register_menus($return = false){
	$tt_menus = array('primary' => esc_attr_x('Main Menu', 'dashboard','locales'), 'footer' => esc_attr_x('Footer Menu', 'dashboard', 'locales'));
	if($return)
		return array('primary' => 'Main Menu', 'secondary' => 'Side Menu', 'footer' => 'Footer Menu' );
	register_nav_menus($tt_menus);
}
add_action('init', 'tt_register_menus');


function tt_print( $param ){
	print esc_attr( $param );
}

function tt_locales_to_js() {
	$send_js = array(
		'dirUri' => get_template_directory_uri()
	);
	wp_localize_script( 'options.js', 'themeOptions', $send_js );
	wp_register_script( 'g-map', '//maps.googleapis.com/maps/api/js?key='._go('google_api_key').'&libraries=places'
		, array('jquery'), null, true );
	wp_enqueue_script( 'g-map');
}
add_action( 'wp_enqueue_scripts', 'tt_locales_to_js', 1 );



function tt_locales_admin_js( $hook ) {
	wp_enqueue_script( 'admin-g-map', '//maps.googleapis.com/maps/api/js?key='._go('google_api_key').'&libraries=places', array('jquery'), null, true );
}
add_action( 'admin_enqueue_scripts', 'tt_locales_admin_js', 10, 1);


/***********************************************************************************************/
/* Google fonts + Fonts changer */
/***********************************************************************************************/

TT_ENQUEUE::$gfont_changer = array(
		_go('logo_text_font'),
		_go('main_content_text_font'),
		_go('sidebar_text_font'),
		_go('menu_text_font')
	);
TT_ENQUEUE::$base_gfonts = array('Montserrat');
TT_ENQUEUE::add_js(array('jquery-form'));
?>


<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class Network{
	public $net_id;
	public $net_name;
	public $net_label;
	public $net_pharms;

	public function __construct($id, $name, $label, $net_pharms){
		$this->net_id = $id;
		$this->net_name = $name;
		$this->net_label = $label;
		$this->net_pharms = $net_pharms;
	}
}

class Pharmacy{
	public $phar_id;
	public $phar_name;
	public $street;
	public $latitude;
	public $longitude;
	public $phone;
	public $email;
	public $website;
	public $opening_at;
	public $closing_at;
	public $distance;

	public function __construct($id, $name, $street, $latitude, $longitude, $phone, $email, $website,$opening, $closing, $distance="?? m"){
		$this->phar_id = $id;
		$this->phar_name = $name;
		$this->street = $street;
		$this->latitude = $latitude;
		$this->longitude = $longitude;
		$this->phone = $phone;
		$this->email = $email;
		$this->website = $website;
		$this->opening_at = $opening;
		$this->closing_at = $closing;
		$this->distance = $distance;
	}
}


function get_the_distance($or_lat, $or_long, $dest_lat, $dest_long){
	$curl = curl_init();
	curl_setopt_array($curl, array(
	CURLOPT_URL => "https://maps.googleapis.com/maps/api/directions/json?origin=".$or_lat.",".$or_long."&destination=".$dest_lat.",".$dest_long."&key=AIzaSyCnjCTk-fTAVxyPADepxbBvTEdFt1qZ0qA",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET"
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
		$distance = 0;
	} else {
		$decoder = json_decode($response);
		$encoder = json_encode($decoder, JSON_UNESCAPED_SLASHES);
		$final_decoder = json_decode($encoder);
		$distance = $final_decoder->routes[0]->legs[0]->distance->text;
	}
	return $distance;
}
<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>
<?php 
	$order_id = $order->get_id();
  echo '<script>console.log("achat complété!")</script>';
  //logs
  error_reporting(E_ALL);

  //Sellsy : RÃ©cupÃ©ration des ids nÃ©cessaires au bon fonctionnement de l'API (Id du compte Sellsy de Persil et Cie / Banesto)
  //consumer token 191c93fdb37e0fd427c7750bb333b7b98d3729f5
  // consumer secret f6a2cbdb292076b8fe343e002c10f1573ec92e42
  // utilisateur token 63d3771f310cd0ec825259bc728517af3c395a4c
  // utilisateur secret 676703e7eb9871d585f9d3fe357218ae51418cff
  $tva_20 = 2753137;
  $tva_5point5 = 2753138;
  $tva_0 = 2753141;
  $card_id = 2753169;

  //Array de correspondance entre les produits WooCommerce et Sellsy
  $correspondance = array();
  //panier principal
  $correspondance[15] = 7315693;
  $correspondance[84] = 7315695;
  //produit facultatif 1
  $correspondance[85] = 7315698;
  $correspondance[86] = 7315697;
  //produit facultatif 2
  $correspondance[290] = 7684029;
  $correspondance[291] = 7684030;
  //produit facultatif 3
  $correspondance[292] = 7684032;
  $correspondance[293] = 7684031;
  //produit facultatif 4
  $correspondance[294] = 7684034;
  $correspondance[295] = 7684033;
  //produit facultatif 5
  $correspondance[297] = 7684036;
  $correspondance[296] = 7684035;
  //produit facultatif 6
  $correspondance[298] = 7684038;
  $correspondance[299] = 7684037;
  //produit facultatif 7
  $correspondance[300] = 7684040;
  $correspondance[301] = 7684039;
  //produit facultatif 8
  $correspondance[302] = 7684042;
  $correspondance[303] = 7684041;
  //produit facultatif 9
  $correspondance[304] = 7684045;
  $correspondance[306] = 7684044;
  //produit facultatif 10
  $correspondance[307] = 7684047;
  $correspondance[308] = 7684046;
  $correspondance[327] = 9975038;
  //produit facultatif 11
  $correspondance[1145] = 8554371;
  $correspondance[1146] = 8554374;

  //produit facultatif 12
  $correspondance[1147] = 8554383;
  $correspondance[1148] = 8554385;

  //produit facultatif 13
  $correspondance[1149] = 8554389;
  $correspondance[1151] = 8554390;

  //produit facultatif 14
  $correspondance[1152] = 8554391;
  $correspondance[1153] = 8554394;

  //produit facultatif 15
  $correspondance[1154] = 8554395;
  $correspondance[1155] = 8554397;

  //produit facultatif 16
  $correspondance[1157] = 8554398;
  $correspondance[1158] = 8554401;

  //produit facultatif 17
  $correspondance[1159] = 8554403;
  $correspondance[1161] = 8554404;

  //produit facultatif 18
  $correspondance[1162] = 8554406;
  $correspondance[1163] = 8554407;

  //produit facultatif 19
  $correspondance[1164] = 8554408;
  $correspondance[1165] = 8554409;

  //produit facultatif 20
  $correspondance[1166] = 8554410;
  $correspondance[1167] = 8554412;

  //produit facultatif 21
  $correspondance[1168] = 8554413;
  $correspondance[1169] = 8554415;
  
  //produit facultatif 22
  $correspondance[1170] = 8554416;
  $correspondance[1171] = 8554417;

  //WooCommerce : Infos sur le client et la commande

  $email_client = $order->get_billing_email();
  $prenom_client = $order->get_billing_first_name();
  $nom_client = $order->get_billing_last_name();
  $nom_complet = $prenom_client . " " . $nom_client;
  $telephone_client = $order->get_billing_phone();
  $reference_commande = $order_id;
  $date_commande = $order->get_date_paid(); 
  $montant_commande = $order->get_total();
  $address_1 = $order->get_billing_address_1();
  $cp = $order->get_billing_postcode();
  $city = $order->get_billing_city();
  $country = $order->get_billing_country();

  $lignes_commande = array();
  $compteur_ligne = 1;
  $shiptax = $order->get_shipping_total();
  $shipname = $order->get_shipping_method();
  $shipn = explode(' - ', $shipname)[0];
  foreach ($order->get_items() as $line_item){

	  $product = new WC_Product($line_item->get_product_id());
	  $row_linkedid = $correspondance[$line_item->get_product_id()];
	  $row_unitAmount = round($product->get_price() / 1.2, 2);


	  $lignes_commande[$compteur_ligne] = [
			  'row_type' => 'once', 
			   'row_name' => $line_item->get_name(),
			   'row_qt' => $line_item->get_quantity(),
			   'row_unitAmount' => $row_unitAmount,
			   'row_unit' => 'unité',
			   'row_taxid' => 3983941,
	  ];
	  $compteur_ligne++;
  }
  $lignes_commande[$compteur_ligne] = [
	  'row_type' => 'shipping',
	  'row_shipping' => $shipn,
	  'row_unitAmount' => round($shiptax / 1.2, 2),
	  'row_taxid' => 3983941,
	  'row_qt' => 1,
  ];
  $userToken = '216bbd3bd1ea06a408083ac464746c86eb2cd5c7';
  $userSecret = 'c2db9dbc132e885afdcbb14e5cd0e20e7c233411';
  $consumerKey = '3b946aebe219c9423dd575a6baed2448bc35cbf0';
  $consumerSecret = '1115687d3ef59e73a2af09fcc36a6cd59bea9f18';

  //API Sellsy : RÃ©cupÃ©ration des classes liÃ©es et initialisation
  require get_template_directory() . '/vendor/autoload.php';
  $client = new SellsyApi\Client([
	  'userToken' => $userToken, 'userSecret' => $userSecret,
	  'consumerToken'  => $consumerKey, 'consumerSecret' => $consumerSecret,
  ]);

//   $service_client = $client->getService('Accountdatas');
//   $taxes = $service_client->call('getShippingList', []);
  echo '<script>console.log('.json_encode($shipn).')</script>';
  //API Sellsy : RÃ©cupÃ©ration du contact par email
  $service_client = $client->getService('Client');
  $liste_client = $service_client->call('GetList', ['pagination' => ['nbperpage' => 1], 'search' => ['type' => 'person', 'email' => $email_client]]);

  $liste_client_total = $liste_client['infos']['nbtotal'];
  $contact_exists = false;
  $existing_third_id = 0;
  $existing_contact_id = 0;

  if ($liste_client_total > 0) {
	  $contact_exists = true;
	  $existing_contact_id = reset($liste_client['result'])['maincontactid'];
	  $existing_third_id = reset($liste_client['result'])['thirdid'];
  }


  //API Sellsy : Si le contact n'existe pas, on le crÃ©Ã© et on rÃ©cupÃ¨re le third id
  if (!$contact_exists){
	  $client_created = $service_client->call('create', ['third' => ['name' => $nom_complet, 'type' => 'person'], 'contact' => ['name' => $nom_client, 'forename' => $prenom_client, 'email' => $email_client, 'mobile' => $telephone_client], 'address' => ['name' => $address_1, 'zip' => $cp, 'town' => $city]]);
	  $existing_contact_id = $client_created['client_id'];
	  $nouveau_client = $service_client->call('GetList', ['pagination' => ['nbperpage' => 1], 'search' => ['type' => 'person', 'email' => $email_client]]);
	  $existing_third_id = reset($nouveau_client['result'])['thirdid'];
  }

  echo '<script>console.log("étape du client terminé")</script>';
  //API Sellsy  : CrÃ©ation de la facture pour la commande 
  $service_document = $client->getService('Document');
  $facture = $service_document->call('create', 
  	[
  		'document' => 
  			[
  				'doctype' => 'invoice',
  				'thirdid' => $existing_third_id,
  				'thirdident' => $reference_commande,
  			],
			'row' => $lignes_commande,
  	]
  );

//   $totalAllInc = $order->get_total();
//   $totalTaxesFree = round($totalAllInc / 1.055, 2);
//   $montant_tva = $totalAllInc - $totalTaxesFree;

//   $facture = $service_document->call('create', 
// 	  [
// 		  'document' => 
// 		  [
// 			  'doctype' => 'invoice',
// 			  'thirdid' => $existing_third_id,
// 			  'thirdident' => $reference_commande,
// 			  'payMediums' => [$card_id],
// 			  'overrideTotals' => true,
// 			  'overrideTotalsData' => 
// 			  [
// 				  'totalTaxesFree' => $totalTaxesFree,
// 				  'tax' => [
// 					  $tva_5point5 => $montant_tva,
// 				  ],
// 				  'totalAllInc'=> $totalAllInc,
// 			  ],
// 		  ],
// 		  'row' => $lignes_commande,
// 	  ]
//   );

  $facture_id = $facture['doc_id'];
//   $validation_facture = $service_document->call('validate', ['docid' => $facture_id, 'date' => time()]);
//   $facture_finale_id = $validation_facture['ident'];

  echo '<script>console.log("création facture effectué")</script>';
  //API Sellsy  : CrÃ©ation du paiement associÃ© Ã  la facture
  $date = new DateTime();
  
  $paiement = $service_document->call('createPayment', 
	  [
		  'payment' => 
		  [
			  'date'      => $date->getTimestamp(),
			  'amount'    => $montant_commande,
			  'medium'    => $card_id,
			  'doctype'   => 'invoice',
			  'docid'     => $facture_id
		  ]
	  ]
  );

  echo '<script>console.log("création paiement effectué")</script>';
?>
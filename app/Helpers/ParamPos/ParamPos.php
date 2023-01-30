<?php

namespace App\Helpers\ParamPos;

use CodeDredd\Soap\Facades\Soap;

class ParamPos
{
    static function payment($arg)
    {
        print_r($arg);
    }

    static function AddCardPayment($cardInfo = array())
    {

        /*
        G	Evet	Nesne	-	ST_WS_Guvenlik Nesnesi
        GUID	Evet	String	-	GUID Değeri
        KK_Sahibi	Evet	String	150	Kredi Kartı Sahibinin Adı Soyadı
        KK_No	Evet	String	16	Kredi Kartı Numarası
        KK_SK_Ay	Evet	String	2	Kredi Kartının Son Kullanma Tarihi (Ay)
        KK_SK_Yil	Evet	String	4	Kredi Kartının Son Kullanma Tarihi (Yıl)
        KK_Kart_Adi	Hayır	String	150	Saklanacak Kredi Kartı adı, Opsiyonel
        KK_Islem_ID	Hayır	String	200	Saklanacak Kredi Kartına ait tarafınıza iletilecek tekil ID değeri

        $client=new SoapClient("test.wsdl",
         array( 'soap_version'=>SOAP_1_2,
         'trace'=>1, 'classmap' => array('Person' => "Person", 'PersonList' => "PersonList")  ));*/


        //$response = Soap::baseWsdl('https://test-dmz.param.com.tr:4443/out.ws/service_ks.asmx?WSDL')->KS_Kart_Ekle(
        $response = Soap::baseWsdl('https://posws.param.com.tr/out.ws/service_ks.asmx?WSDL')->KS_Kart_Ekle(
            [
                'G' => array(
                    'CLIENT_CODE' => '',
                    'CLIENT_USERNAME' => '',
                    'CLIENT_PASSWORD' => ''
                ),
                'GUID' => '',
                'KK_Sahibi' => 'test',
                'KK_No' => '4546711234567894',
                'KK_SK_Ay' => '12',
                'KK_SK_Yil' => '26',
                'KK_Kart_Adi' => 'Albert',
                'KK_Islem_ID' => null
            ]
        );

        if (!($response->json()['KS_Kart_EkleResult']['Sonuc'])) {
            return false;
        }

        return $response = array(
            'ks_guid' => $response->json()['KS_Kart_EkleResult']['KS_GUID'],
            'result' => $response->json()['KS_Kart_EkleResult']['Sonuc']
        );
    }

    static function DeleteCardPayment($r_id)
    {

        //$response = Soap::baseWsdl('https://test-dmz.param.com.tr:4443/out.ws/service_ks.asmx?WSDL')->KS_Kart_Ekle(
        $response = Soap::baseWsdl('https://posws.param.com.tr/out.ws/service_ks.asmx?WSDL')->KS_Kart_Sil(
            [
                'G' => array(
                    'CLIENT_CODE' => '',
                    'CLIENT_USERNAME' => '',
                    'CLIENT_PASSWORD' => ''
                ),
                'KS_GUID' => $r_id,
                'KK_Islem_ID' => null
            ]
        );

        if (!($response->json()['KS_Kart_SilResult']['Sonuc'])) {
            return false;
        }
        return true;
    }

    static function GetCardPaymentList($cardInfo = array())
    {


        //$response = Soap::baseWsdl('https://test-dmz.param.com.tr:4443/out.ws/service_ks.asmx?WSDL')->KS_Kart_Ekle(
        $response = Soap::baseWsdl('https://posws.param.com.tr/out.ws/service_ks.asmx?WSDL')->KS_Kart_Liste(
            [
                'G' => array(
                    'CLIENT_CODE' => '',
                    'CLIENT_USERNAME' => '',
                    'CLIENT_PASSWORD' => ''
                ),
                'GUID' => '',
                'KK_Kart_Adi' => 'Albert',
                'KK_Islem_ID' => null,

            ]
        );

        print_r($response->body());
    }
}

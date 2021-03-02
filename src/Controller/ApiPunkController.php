<?php
/**
 * PHP version 7.2
 * apiPunkResults  - APIPunkController.php
 * @author   Freddy Tandazo <freddy.tandazo.yanez@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use GuzzleHttp\Client;


/**
 * Class ApiPunkController
 * @package src\Controller
 * @Route(path=ApiPunkController::RESULT_API_PATH, name="api_punk_")
 */
class ApiPunkController extends AbstractController
{
    //ruta de la api de punk
    const RESULT_API_PATH = '/api/v1/punk';

    /**
     * @Route(path="", name="getSearchByFood", methods={ Request::METHOD_GET })
     * @return Response
     */
    public function getSearchByFood(Request $request)
    {
        $food = $request->query->get('food');
        $url = 'https://api.punkapi.com/v2/beers?food=' . $food;
        $client = new Client(['base_uri' => $url]);
        $response = $client->request('GET', $url);

        $bodyResponseString = $response->getBody()->getContents();
        $bodyResponse = json_decode($bodyResponseString);

        $data = array();
        foreach ($bodyResponse as $valor) {
            $id = '';
            $name = '';
            $description = '';
            foreach ($valor as $key => $value) {
                if ($key == 'id') {
                    $id = $value;
                }
                if ($key == 'name') {
                    $name = $value;
                }
                if ($key == 'description') {
                    $description = $value;
                }
            }
            $data[$id] = ['id' => $id, "name" => $name, "description" => $description];
        }
        return (empty($data)) ? $this->error404() : new JsonResponse(['data' => $data], Response::HTTP_OK);
    }

    protected function error404(): JsonResponse
    {
        $mensaje = [
            'code' => Response::HTTP_NOT_FOUND,
            'mensaje' => 'Not found resource not found'
        ];
        return new JsonResponse(
            $mensaje,
            Response::HTTP_NOT_FOUND
        );
    }

}


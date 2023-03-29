

<?php 
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http;

class PostRequestMiddleware implements IMiddleware {

    function handle(Pecee\Http\Request $request) : void {
        $body = $request->getInputHandler()->getOriginalPost();

        if (!empty($body['dataEntrega']) || !empty($body['carga'])) {
            
        } else {
            $request->setRewriteUrl('/');
        }

    }

}


?>
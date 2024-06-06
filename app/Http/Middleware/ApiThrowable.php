<?php

namespace App\Http\Middleware;

use App\Helpers\Api\ApiError;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ApiThrowable
{

    protected function validationExceptionToApiError(ValidationException $e) : ApiError
    {
        $error = $e->errors();
        $error = array_pop($error);
        $error = $error[0];

        throw new ApiError($error, 422);
    }

    protected function throwableToApiError(\Throwable $e) : ApiError
    {

        if(config('app.debug')){
            throw new ApiError($e->getMessage(), 500);
        }else{
            throw new ApiError('System error', 500);
        }

    }

    protected function redirectToApiError(HttpException $e) : ApiError
    {
        return new ApiError($e->getMessage(), $e->getStatusCode());
    }

    protected function modelNotFoundToApiError(ModelNotFoundException $e) : ApiError
    {
        return new ApiError('Not Found', 404);
    }

    public function handle(Request $request, Closure $next) : JsonResponse
    {

      try {

          try {

              $response = $next($request);

              if ($response->exception) {
                  throw $response->exception;
              }

              if($response instanceof JsonResponse){
                  $content = $response->getData(true);
              }else{
                  $content = $response->getContent();
              }

              return response()->json([
                  'status' => true,
                  'response' => $content
              ]);

          }catch (ModelNotFoundException $e){
                throw $this->modelNotFoundToApiError($e);
          }catch (HttpException $e){
              throw $this->redirectToApiError($e);
          } catch (ApiError $e){
              throw $e;
          } catch (ValidationException $e){
              throw $this->validationExceptionToApiError($e);
          } catch (\Throwable $e) {
              throw $this->throwableToApiError($e);
          }

      }catch (ApiError $e){

            return response()->json([
                'status' => false,
                'error' => $e->getMessage(),
                'code' => $e->getCode()
            ]);

      }catch (\Throwable $e){
          throw $this->throwableToApiError($e);
      }

    }



}

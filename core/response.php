<?php

class Response {
  private const HTTP_STATUS_OK = 200;
  private const HTTP_STATUS_BAD_REQUEST = 400;

  /* Retorna um status de sucesso e uma resposta no formato JSON */
  static function success($message, $data = []) {
    http_response_code (self::HTTP_STATUS_OK);

    $data['message'] = $message;

    echo json_encode($data);
    exit;
  }

  /* Retorna um status de erro e uma resposta no formato JSON */
  static function badRequest($message) {
    http_response_code (self::HTTP_STATUS_BAD_REQUEST);

    $data = [
      'message' => $message,
    ];

    echo json_encode($data);
    exit;
  }
}

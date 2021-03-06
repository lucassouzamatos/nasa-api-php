# Nasa API
Pacote php para consumir a API de imagens da Nasa.
![GitHub last commit](https://img.shields.io/github/last-commit/lucassouzamatos/nasa-api-php.svg)
![GitHub commit merge status](https://img.shields.io/github/commit-status/lucassouzamatos/nasa-api-php/master/0912a8ae1f79a472daffbf99fad38df8a551eeae.svg)
![GitHub issues](https://img.shields.io/github/issues/lucassouzamatos/nasa-api-php.svg)
## Instalação
Através do git:

> git clone git@github.com:iLuc1/nasa-api-php.git

Através do composer:

> composer require souzalc/nasa-api-php

## Uso

### Criando um request
Inicie criando a instância de Parameter:

    $parameter = new Parameter();
    $parameter->setApiKey('DEMO_KEY');
    $parameter->setLat(1.5);
    $parameter->setLon(110.75);
    $parameter->setCloudScore(true);
    $parameter->setDim(0.5);

Os parâmetros "Lat", "Lon" e "ApiKey" são obrigatórios, caso não preenchidos haverá erros no request.

Para iniciar a requisição, basta instanciar Request com o Parameter como argumento do construtor:

$request = new Request($parameter);

#### Obtendo a resposta da API:
    $request->getResponse() // Retorna a resposta original da API.

A partir de Request, também é possível ter dados específicos como:
    
    $request->getCloudScore();
    $request->getDate();
    $request->getServiceVersion();
    $request->getImageUrl();

Retornando o resource:
    
    $request->getResource()

Retorna uma instancia de Resource, que possui as respostas: dataSet e planet.

### Verificando erros
Caso a requisição tenha algum retorno inesperado, é possível verificar os erros a partir de 

#### Para informações mais específicas da API:
https://api.nasa.gov/api.html#imagery

# Proclamadores - Gerenciador de Discursos Públicos

**Autor:** Danilo Bossanova
**Data:** 01/02/2025 16:21:27  
**Resumo:** Esta aplicação tem como objetivo gerenciar os discursos públicos que serão proferidos em congregações, organizando a programação semanal de discursos e oradores. Ela gerencia informações sobre oradores, discursos, congregações, entre outras entidades.

---

## Sobre o Projeto

Este projeto é uma aplicação web desenvolvida com o [Laravel](https://laravel.com) e tem como finalidade auxiliar no controle e na programação dos discursos públicos em congregações. Com ela, é possível:

- Cadastrar e gerenciar **Oradores**;
- Registrar **Discursos** e associá-los a oradores e congregações;
- Configurar a programação semanal de discursos;
- Visualizar e consultar históricos e estatísticas de discursos.

## Funcionalidades

- **Cadastro e gerenciamento de oradores:** Inclusão, edição e exclusão de registros dos oradores.
- **Registro de discursos:** Cadastro dos discursos proferidos, com informações como data, tema e duração.
- **Gestão de congregações:** Cadastro das congregações e vinculação dos discursos e oradores.
- **Programação semanal:** Visualização e organização da agenda dos discursos para a semana.
- **Relatórios e estatísticas:** Geração de relatórios para acompanhamento das atividades.

## Stack Tecnológico

- **Backend:** PHP 8.1, [Laravel Framework 10.x](https://laravel.com)
- **Frontend:** Blade templates (padrão do Laravel) e [Livewire](https://laravel-livewire.com) para interatividade
- **Bibliotecas e Pacotes Adicionais:**
    - `guzzlehttp/guzzle` para requisições HTTP
    - `laravel/horizon` para monitoramento de jobs em background
    - `laravel/sanctum` para autenticação API
    - `laravel/scout` para buscas
    - `livewire/volt` para integrações com Livewire
- **Ferramentas de Desenvolvimento:**
    - Testes automatizados com Pest
    - Ferramentas de análise de código com Larastan
    - [Laravel Telescope](https://laravel.com/telescope) para debug e monitoramento
    - [Laravel Dusk](https://laravel.com/dusk) para testes de interface

## Pré-requisitos

- PHP 8.1 ou superior
- Composer
- Banco de Dados (a configuração pode variar conforme a necessidade, ex.: MySQL, PostgreSQL, etc.)
- Node.js e NPM/Yarn (para compilação de assets, se necessário)

## Instalação

1. **Clone o repositório:**

   ```bash
   git clone https://seu-repositorio-url.git
   cd nome-do-projeto
   composer install
   npm install
    cp .env.example .env
    php artisan key:generate
   php artisan migrate --seed
   php artisan serve
    ```

## Uso
Após a instalação, acesse a aplicação através do navegador (normalmente em http://localhost:8000).

A partir daí, você poderá:
Gerenciar oradores, discursos e congregações;
Visualizar a programação semanal dos discursos;
Gerar relatórios e acompanhar o histórico das atividades.

## Contribuição
Contribuições são bem-vindas! Para colaborar com o projeto, siga os passos abaixo:

Faça um fork do projeto.

Crie uma branch para sua nova feature ou correção:


    git checkout -b feature/nome-da-feature


## Realize suas alterações e commits:


    git commit -m 'Adiciona nova feature'

Envie suas alterações para sua branch:

```bash
git push origin feature/nome-da-feature
```
Abra um Pull Request detalhando suas alterações.

## Licença
Este projeto está licenciado sob a MIT License.

## Contato
Caso tenha dúvidas ou sugestões, entre em contato através do e-mail: danilo.bossanova@hotmail.com


## About UrlSlim

UrlSlim is a simple api for generating shortened url.

so you want to have your own urls generation server shortened in your controlled environment

## License

The UrlSlim is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## How to config

1 - Clone repo\
2 - Run composer install\
3 - Rename .env.example for .env\ 
4 - Add database config in .env\
5 - Run php artisan migrate - for generate the database\
6 - Run php artisan db:seed - for populate parteners table\

## How to use

rum php artisan serve for start a server local\

[/POST] /api/generate
```json
{
	"partner" : "Partner 1",
	"partner_key" : "3fcG*KD4yT3C2EdU^*SzBdk3",
	"expires_at" : "2020-04-10",
	"redirect" :"https://www.google.com/search?q=laravel&rlz=1C1GCEA_enBR821BR821&oq=laravel&aqs=chrome.0.69i59l4j69i60l2.6966j0j8&sourceid=chrome&ie=UTF-8"
}

Response
{
  "expires_at": "2020-04-10",
  "link": "http://localhost:8000/5e8f494e28829"
}

```

## Made By

Laravel Framework

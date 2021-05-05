![](https://heatbadger.now.sh/github/readme/contributte/microapi/?deprecated=1)

<p align=center>
    <a href="https://bit.ly/ctteg"><img src="https://badgen.net/badge/support/gitter/cyan"></a>
    <a href="https://bit.ly/cttfo"><img src="https://badgen.net/badge/support/forum/yellow"></a>
    <a href="https://contributte.org/partners.html"><img src="https://badgen.net/badge/sponsor/donations/F96854"></a>
</p>

<p align=center>
    Website 🚀 <a href="https://contributte.org">contributte.org</a> | Contact 👨🏻‍💻 <a href="https://f3l1x.io">f3l1x.io</a> | Twitter 🐦 <a href="https://twitter.com/contributte">@contributte</a>
</p>

## Disclaimer

| :warning: | This project is no longer being maintained. Please use [contributte/apitte](https://github.com/contributte/apitte).
|---|---|

| Composer | [`minetro/api`](https://packagist.org/minetro/apii) |
|---| --- |
| Version | ![](https://badgen.net/packagist/v/minetro/api) |
| PHP | ![](https://badgen.net/packagist/php/minetro/api) |
| License | ![](https://badgen.net/github/license/minetro/api) |

## Usage

```php
<?php
use Minetro\Api\ApiRequest;
use Minetro\Api\ApiResponse;
use Minetro\Api\Controller\Controller;

class DummyController implements Controller
{
	/**
	 * @Route('/')
	 * @Method('GET')
	 *
	 * @param ApiRequest  $request
	 * @param ApiResponse $response
	 *
	 * @return void
	 */
	public function actionDefault(ApiRequest $request, ApiResponse $response)
	{
	}
}
```

## Development

This package was maintain by these authors.

<a href="https://github.com/f3l1x">
  <img width="80" height="80" src="https://avatars2.githubusercontent.com/u/538058?v=3&s=80">
</a>

-----

Consider to [support](https://contributte.org/partners.html) **contributte** development team.
Also thank you for being used this package.

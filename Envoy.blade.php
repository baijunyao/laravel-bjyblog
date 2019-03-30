@setup
	require __DIR__.'/vendor/autoload.php';
	$dotenv = Dotenv\Dotenv::create(__DIR__);
	try {
		$dotenv->load();
		$dotenv->required(['DEPLOY_IP', 'DEPLOY_PORT', 'DEPLOY_USER', 'DEPLOY_PATH', 'DEPLOY_BRANCH'])->notEmpty();
	} catch ( Exception $e )  {
		echo $e->getMessage();
	}

	$ip = getenv('DEPLOY_IP');
	$port = getenv('DEPLOY_PORT');
	$user = getenv('DEPLOY_USER');
	$path = getenv('DEPLOY_PATH');
	$branch = getenv('DEPLOY_BRANCH');
	if ( substr($path, 0, 1) !== '/' ) throw new Exception('path 必须是绝对路径');
	$path = rtrim($path, '/');
@endsetup

@servers(['web' => ["$user@$ip -p $port"]])

@task('deploy', ['on' => 'web'])
	cd {{ $path }}
	git pull origin {{ $branch }}
    composer install --no-dev --optimize-autoloader
	php artisan bjyblog:update
@endtask

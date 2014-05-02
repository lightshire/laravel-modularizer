<?php
namespace Sendy\Modularizer\Creators;

use Illuminate\Filesystem\Filesystem;

/**
 * @author Sendy Halim <sendyhalim93@gmail.com>
 */
class ModuleCreator extends Creator
{
	private $directories = [
		'Controllers',
		'Repositories/Read',
		'Repositories/Write',
		'RepositoryInterfaces/Read',
		'RepositoryInterfaces/Write',
		'views'
	];

	private $files = [
		'routes.php'
	];

	public function __construct(Filesystem $f)
	{
		parent::__construct($f);
	}

	public function make($path)
	{
		$path = $this->removeTrailingSlash($path);

		foreach ($this->directories as $dir)
		{
			$dirPath = "{$path}/{$dir}";
			$this->prepareDirectory($dirPath);
		}

		foreach ($this->files as $file)
		{
			$this->create($file, $path, '');
		}
	}
}
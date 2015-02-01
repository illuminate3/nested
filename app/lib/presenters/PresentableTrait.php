<?php namespace lib\presenters;

use lib\presenters\exceptions\PresenterException;

trait PresentableTrait {
//dd('loaded');

	/**
	 * The presenter instance.
	 *
	 * @var Presenter
	 */
	protected $presenterInstance;

	/**
	 * Create and return a Presenter instance.
	 *
	 * @return Presenter
	 *
	 * @throws Exceptions\PresenterException
	 */
	public function present()
	{
//dd('loaded');
		if ( ! $this->presenter or ! class_exists($this->presenter))
		{
//			throw new PresenterException('Please set the $presenter property to your presenter class.');
			throw new PresenterException( trans('lingos::general.presenters.exception', $presenter) );
		}

		if ( ! isset($this->presenterInstance))
		{
			$this->presenterInstance = new $this->presenter($this);
		}

		return $this->presenterInstance;
	}

}

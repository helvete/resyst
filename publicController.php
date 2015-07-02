<?php
/**
 * Public controller
 */
class PublicController {

	/**
	 * Constant stores default posts count per page
	 */
	const DEFAULT_POSTS_COUNT = 30;

	/**
	 * Command queue
	 * @var array
	 */
	private $_queue = array();

	/**
	 * Posts cache
	 * @var array
	 */
	private $_posts = array();

	/**
	 * Construct
	 */
	public function __construct() {
		$_PARAM = $_GET + $_POST;
		foreach (get_class_methods($this) as $methodName) {
			if (array_key_exists($methodName, $_PARAM)) {
				$this->_queue[$methodName] = $_PARAM[$methodName];
				// temporary
				$this->$methodName($_PARAM[$methodName]);
			}
		}
	}


	/**
	 * display indiviual post
	 *
	 * @param  int	$id
	 * @return PublicController
	 */
	public function displayPost($id) {
		$posts = new Posts();
		$this->_posts = $posts->get(null, $id, null);

		return $this;
	}


	/**
	 * display posts normally
	 *
	 * @param  int	$count
	 * @return PublicController
	 */
	public function displayPosts($count = self::DEFAULT_POSTS_COUNT) {
		$posts = new Posts();
		$this->_posts = $posts->get($count);

		return $this;
	}


	/**
	 * display posts by selected tag name
	 * TODO: print tag reset link
	 *
	 * @param  int	$tagName
	 * @return PublicController
	 */
	public function displayTag($tagName) {
		$posts = new Posts();
		$this->_posts = $posts->get(self::DEFAULT_POSTS_COUNT, null, $tagName);

		return $this;
	}


	/**
	 * print html data
	 *
	 * @return PublicController
	 */
	public function printHtml() {
		if (empty($this->_posts)) {
			$this->displayPosts();
		}
		$this->_posts->printHtml();

		return $this;
	}


	/**
	 * is action in action queue?
	 *
	 * @param  string	$actionCode
	 * @return bool
	 */
	public function inQueue($actionCode = null) {
		return array_key_exists($actionCode, $this->_queue);
	}
}

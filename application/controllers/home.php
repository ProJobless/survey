<?php

	/**
	 * @ignore
	 */
	class home extends controller {
		/**
		 * @ignore
		 */
		public function index() {
			$this->load('userModel');

			// gather all user data from model
			$tUsers = $this->userModel->getAll();
			
			// assign the user data to view
			$this->set('users', $tUsers);

			// render the page
			$this->view();
		}

		/**
		 * @ignore
		 */
		public function about() {
			// render the page
			$this->view();
		}

		/**
		 * @ignore
		 */
		public function ourteam() {
			// render the page
			$this->view();
		}
	}

?>
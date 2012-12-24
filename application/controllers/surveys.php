<?php

	/**
	 * @ignore
	 */
	class surveys extends controller {
		/**
		 * @ignore
		 */
		public function get_new() {
			statics::requireAuthentication(1);

			// render the page
			$this->view();
		}
		/**
		 * @ignore
		 */
		public function post_new() {
			statics::requireAuthentication(1);
			$this->load('surveyModel');
			$surveyID = string::generateUuid();
				$input = array(
					'surveyid' => $surveyID,
					'ownerid' => statics::$user['userid'],
					'title' => http::post('title'),
					'categoryid' => http::post('categoryid'),
					'themeid' => http::post('themeid'),
					'languageid' => http::post('languageid')
				);
				$insertSurvey = $this->surveyModel->insert($input);
			if($insertSurvey > 0){
				echo "<script>alert('Survey Added Successfuly');</script>";
			}
			else {
				echo "<script>alert('Unexpected Error.');</script>";
			}
			$this->view();
		}

		/**
		 * @ignore
		 */

		public function get_index() {
			statics::requireAuthentication(1);

			$this->load('surveyModel');

			// gather all survey data from model
			$tSurveys = $this->surveyModel->getAllByOwner(statics::$user['userid']);
			
			// assign the user data to view
			$this->setRef('surveys', $tSurveys);

			// render the page
			$this->view();
		}

		/**
		 * @ignore
		 */
		public function get_edit($uSurveyId) {
			statics::requireAuthentication(1);

			$this->load('surveyModel');

			// gather all survey data from model
			$tSurvey = $this->surveyModel->get($uSurveyId);
			
			// assign the user data to view
			$this->setRef('survey', $tSurvey);

			// render the page
			$this->view();
		}

		/**
		 * @ignore
		 */
		public function get_report($uSurveyId) {
			statics::requireAuthentication(1);

			$this->load('surveyModel');

			// gather all survey data from model
			$tSurvey = $this->surveyModel->get($uSurveyId);
			
			// assign the user data to view
			$this->setRef('survey', $tSurvey);

			// render the page
			$this->view();
		}
	}

?>

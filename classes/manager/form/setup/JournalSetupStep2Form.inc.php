<?php

/**
 * JournalSetupStep2Form.inc.php
 *
 * Copyright (c) 2003-2006 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @package manager.form.setup
 *
 * Form for Step 2 of journal setup.
 *
 * $Id$
 */

import("manager.form.setup.JournalSetupForm");

class JournalSetupStep2Form extends JournalSetupForm {
	
	function JournalSetupStep2Form() {
		parent::JournalSetupForm(
			2,
			array(
				'focusScopeDesc' => 'string',
				'numWeeksPerReview' => 'int',
				'remindForInvite' => 'int',
				'remindForSubmit' => 'int',
				'numDaysBeforeInviteReminder' => 'int',
				'numDaysBeforeSubmitReminder' => 'int',
				'rateReviewerOnQuality' => 'int',
				'restrictReviewerFileAccess' => 'int',
				'reviewerAccessKeysEnabled' => 'int',
				'reviewPolicy' => 'string',
				'mailSubmissionsToReviewers' => 'int',
				'reviewGuidelines' => 'string',
				'authorSelectsEditor' => 'int',
				'privacyStatement' => 'string',
				'disableUserReg' => 'bool',
				'allowRegReader' => 'bool',
				'allowRegAuthor' => 'bool',
				'allowRegReviewer' => 'bool',
				'restrictSiteAccess' => 'bool',
				'restrictArticleAccess' => 'bool',
				'articleEventLog' => 'bool',
				'articleEmailLog' => 'bool',
				'customAboutItems' => 'object',
				'enableComments' => 'int',
				'enableLockss' => 'bool',
				'lockssLicense' => 'string',
				'reviewerDatabaseLinks' => 'object'
			)
		);
		
		$this->addCheck(new FormValidatorEmail($this, 'envelopeSender', 'optional', 'user.profile.form.emailRequired'));
	}

	function display() {
		$templateMgr = &TemplateManager::getManager();
		if (Config::getVar('general', 'scheduled_tasks'))
			$templateMgr->assign('scheduledTasksEnabled', true);

		// Bring in the comments constants.
		$commentDao = &DAORegistry::getDao('CommentDAO');

		$templateMgr->assign('commentsOptions', array(
			COMMENTS_DISABLED => 'manager.setup.comments.disable',
			COMMENTS_AUTHENTICATED => 'manager.setup.comments.authenticated',
			COMMENTS_ANONYMOUS => 'manager.setup.comments.anonymous',
			COMMENTS_UNAUTHENTICATED => 'manager.setup.comments.unauthenticated'
		));

		parent::display();
	}
}

?>

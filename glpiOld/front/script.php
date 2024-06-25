<?php

/**
 * ---------------------------------------------------------------------
 *
 * GLPI - Gestionnaire Libre de Parc Informatique
 *
 * http://glpi-project.org
 *
 * @copyright 2015-2022 Teclib' and contributors.
 * @copyright 2003-2014 by the INDEPNET Development Team.
 * @licence   https://www.gnu.org/licenses/gpl-3.0.html
 *
 * ---------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of GLPI.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * ---------------------------------------------------------------------
 */

/**
 * Form to edit Cron Task
 */

include('../inc/includes.php');

$crontask = new CronTask();


    if (is_numeric($_POST['execute'])) {
       // Execute button from list.
        $name = CronTask::launch(CronTask::MODE_INTERNAL, intval($_POST['execute']));
    } else {
       // Execute button from Task form (force)
        $name = CronTask::launch(-CronTask::MODE_INTERNAL, 1, $_POST['execute']);
    }
    if ($name) {
       //TRANS: %s is a task name
        Session::addMessageAfterRedirect(sprintf(__('Task %s executed'), $name));
    }
    Html::back();

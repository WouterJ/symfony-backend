<?php
/**
 * /src/App/Command/User/EditUserGroupCommand.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Command\User;

use App\Entity\UserGroup;
use App\Form\Console\UserGroupData;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class EditUserGroupCommand
 *
 * @category    Console
 * @package     App\Command\User
 * @author      TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class EditUserGroupCommand extends Base
{
    /**
     * Name of the console command.
     *
     * @var string
     */
    protected $commandName = 'user:editGroup';

    /**
     * Description of the console command.
     *
     * @var string
     */
    protected $commandDescription = 'Edit specified user group data.';

    /**
     * Supported command line parameters.
     *
     * @var array
     */
    protected $commandParameters = [
        [
            'name'          => 'id',
            'description'   => 'User group ID',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Initialize common console command
        parent::execute($input, $output);

        $groupFound = false;

        // Ask user till user accept founded user
        while (!$groupFound) {
            // Fetch user and show user information
            $userGroup = $this->getUserGroup(true);

            $groupFound = $this->io->confirm('Is this the group which information you want to change?', false);
        }

        /** @var UserGroup $userGroup */

        // Create new DTO with selected user group data
        $dto = new UserGroupData();
        $dto->name = $userGroup->getName();
        $dto->role = $userGroup->getRole();

        /** @var UserGroupData $dto */
        $dto = $this->getHelper('form')->interactUsingForm(
            'App\Form\Console\UserGroup',
            $this->input,
            $this->output,
            ['data' => $dto]
        );

        // Store user group
        $this->storeUserGroup($dto, $userGroup);

        // Uuh all done!
        $this->io->success('User group information changed successfully!');
    }
}

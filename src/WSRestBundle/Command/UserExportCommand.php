<?php
namespace WSRestBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WSRestBundle\Services\UserServices;

class UserExportCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('user:list-users')
            ->setDescription('List all users.')
            ->setHelp('This command allows you list all users...')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $userService = $this->getContainer()->get("user_services");
        foreach ($userService->getUsers() as $user) {
            print_r($user);
        }
    }
}
?>
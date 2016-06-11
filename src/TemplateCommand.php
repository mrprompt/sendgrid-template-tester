<?php
namespace MrPrompt\SendGrid\Console\Template;

use SendGrid;
use SendGrid\Email;
use SendGrid\Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class TemplateCommand extends Command
{
    /**
     * Configure
     *
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('template:test')
            ->setDescription('Sent email using template')
            ->addArgument('template', InputArgument::REQUIRED, 'Template ID')
            ->addArgument('email', InputArgument::REQUIRED, 'Email to sent')
            ->addArgument('from', InputArgument::REQUIRED, 'Email sender')
            ->addArgument('tags', InputArgument::OPTIONAL, 'Substitutions used in template', [])
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $apiKey     = getenv('SENDGRID_API_KEY');
            $to         = $input->getArgument('email');
            $template   = $input->getArgument('template');
            $tags       = $input->getArgument('tags');
            $from       = $input->getArgument('from');

            $email  = new Email();
            $email
                ->addTo($to)
                ->setFrom($from)
                ->setSubject(' ')
                ->setHtml(' ')
                ->setTemplateId($template)
                ->setSubstitutions($tags);

            $sender = new SendGrid($apiKey);
            $sender->send($email);

            $output->writeln('<info>:)</info>');
        } catch (Exception $ex) {
            $output->writeln('<error>' . $ex->getMessage() . '</error>');
        }
    }
}

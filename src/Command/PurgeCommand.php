<?php declare(strict_types=1);

namespace DbalSchema\Command;

use DbalSchema\DbalSchemaCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class PurgeCommand extends Command
{
    private DbalSchemaCommand $schemaCommand;

    public function __construct(DbalSchemaCommand $schemaCommand)
    {
        $this->schemaCommand = $schemaCommand;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName('dbal:schema:purge')
            ->addOption('force', 'f', InputOption::VALUE_NONE);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->schemaCommand->purge($input->getOption('force'), $output);

        return 0;
    }
}

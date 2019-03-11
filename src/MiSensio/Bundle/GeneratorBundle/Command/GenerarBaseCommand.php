<?php

/* Generar Base comando creado por Gilberto y Delva */
namespace MiSensio\Bundle\GeneratorBundle\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Command\Command;
use MiSensio\Bundle\GeneratorBundle\Generator\BaseGenerator;
use Symfony\Component\Console\Input\InputOption;
use MiSensio\Bundle\GeneratorBundle\Command\Helper\QuestionHelper;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ConfirmationQuestion;

/**
 * Generates a Base for a Doctrine entity.
 *
 * @author  Gilberto 
 * @author  Delva
 */
class GenerarBaseCommand  extends GeneratorCommand
{
protected function configure()
    {
        $this
            ->setDefinition(array(
                new InputOption('nonbreProyect', '', InputOption::VALUE_REQUIRED, 'Entre el nombre del proyecto'),
                new InputOption('nombre', '', InputOption::VALUE_NONE, 'Entre el nombre del centro o eslogan del proyecto'),
                new InputOption('estilo', '', InputOption::VALUE_NONE, 'Entre el estilo que desea para la plantilla'),
                ))
            ->setDescription('Generar Base con el estilo seleccionado')
            ->setHelp(<<<EOT
El <info>MiSensio:generar:Base</info> Comando para generar la base con los estilos seleccionado

<info>php app/console doctrine:generate:form AcmeBlogBundle:Post</info>

Every generated file is based on a template. There are default templates but they can be overriden by placing custom templates in one of the following locations, by order of priority:

<info>BUNDLE_PATH/Resources/MiSensioGeneratorBundle/skeleton/form
APP_PATH/Resources/MiSensioGeneratorBundle/skeleton/form</info>

You can check https://github.com/MiSensio/MiSensioGeneratorBundle/tree/master/Resources/skeleton
in order to know the file structure of the skeleton
EOT
            )
            ->setName('MiSensio:generate:Base')
            ->setAliases(array('generate:doctrine:Base'))
        ;
    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {      
      $questionHelper   = $this->getQuestionHelper();
        if ($input->isInteractive()) {
            
             if (!$question = new ConfirmationQuestion($questionHelper->getQuestion('Do you confirm generation', 'yes', '?'), true))
             {
                   $output->writeln('<error>Command aborted</error>');
                return 1;
              }
        }   
        $generatorBase = new BaseGenerator($input->getOption('nonbreProyect'), $input->getOption('nombre'),$input->getOption('estilo'));
    }
    
      protected function interact(InputInterface $input, OutputInterface $output)
    {  
        $questionHelper = $this->getQuestionHelper();
        $questionHelper->writeSection($output, 'Welcome to the generator of templates');             
        $question = new Question($questionHelper->getQuestion('Name of the project', $input->getOption('nonbreProyect')), $input->getOption('nonbreProyect'));
        $question->setValidator(array('MiSensio\Bundle\GeneratorBundle\Command\Validators', 'validateNonbreProyect'));
        $nonbreProyect = $questionHelper->ask($input, $output, $question);
        $input->setOption('nonbreProyect', $nonbreProyect);  
         $output->writeln(array(
            '',
            'Ingrese el nombre del slogan.',
            'Por defecto saldra en blanco.',
            '',
        ));           
        $question = new Question($questionHelper->getQuestion('The business name or the slogan example xxx', $input->getOption('nombre')), $input->getOption('nombre'));
        $nombre = $questionHelper->ask($input, $output, $question);
        $input->setOption('nombre', $nombre);  
        
          $output->writeln(array(
            '',
            'Sleccione el estilo de de la pagina.',
            'Por defecto saldra global verde.',
            '',
        ));
        $question = new Question($questionHelper->getQuestion('Select style (default GlobalVerde)', $input->getOption('estilo')), $input->getOption('estilo'));
        $estilo= $questionHelper->ask($input, $output, $question);
        $input->setOption('estilo', $estilo);  
        $generator = $this->getGenerator();
        if($input->getOption('estilo')==null)
        {
            $generator->generate($input->getOption('nonbreProyect'),$input->getOption('nombre'),'GlobalVerde');}
        else
        {
            $generator->generate($input->getOption('nonbreProyect'),$input->getOption('nombre'),$input->getOption('estilo'));}
        }
     protected function createGenerator()
    {
        return new BaseGenerator();
    }
}

?>

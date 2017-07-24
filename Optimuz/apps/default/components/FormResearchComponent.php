<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.3
 * @package Html
 * @subpackage Component
 */

/**
 * Apresenta as questões adicionadas da pesquisa de acordo com o seu tipo de
 * resposta.
 * @author Bruno Cordeiro.
 * @version 0.1
 */
class FormResearchComponent extends HtmlComponent
{
	/**
	 * Cria as grids de cateogias das perguntas.
	 * @param PropelCollection
	 */
	public function createCategory(PropelCollection $categories)
	{
		foreach($categories as $category)
		{
			$this->append(
					'<div class="grid simple border-solid">'
						. '<div class="grid-title no-border">'
							. '<h4>' . $category->getNome() . '</h4>'
						. '</div>'
						. '<div class="grid-body no-border js-category" id="' . $category->getId() . '"></div>'
					. '</div>'
				);
		}
	}

	/**
	 * Adiciona as questões ao objeto.
	 * @param PropelCollection $questionsAdded Coleção de objetos contendo
	 * as perguntas adicionadas a uma pesquisa.
	 * @param Bool $isEditable (opcional) Informa se o formulário apresentado
	 * será editável.
	 */
	public function addQuestions(PropelCollection $questionsAdded, $isEditable = false)
	{
		foreach($questionsAdded as $key => $question)
		{
			$box = $this->find('#' . $question->getCategoriaId())->getFirst();

			$datas = 'data-tipo-resposta="' . $question->getTipoResposta() . '"'
					. 'data-categoria-id="' . $question->getCategoriaId() . '"'
					. 'data-pergunta-id="' . $question->getId(). '"';

			$buttonsEdit =
						'<div class="pull-right clearfix">'
							. '<h4>'
								. '<a title="Remover pergunta" class="pull-right js-remove-question p-l-10" href="javascript:;">'
									. '<i class="fa fa-times text-danger"></i>'
								. '</a>'
								. '<a title="Editar pergunta" class="pull-right js-rewrite-question" href="javascript:;">'
									. '<i class="fa fa-pencil text-black"></i>'
								. '</a>'
							. '</h4>'
						. '</div>';


			if(!$isEditable || $question->getCategoriaId() == Categoria::CATEGORIA_PADRAO)
			{
				$datas = null;
				$buttonsEdit = null;
			}

			$box->append(
				'<div class="row js-line-question" '. $datas .'>'
						. '<div class="form-group col-md-12">'
							. $buttonsEdit
							. '<label class="form-label">'
								. '<span class="semi-bold js-number">' . ($key + 1) . ' - </span>'
								. '<span class="js-question">' . $question->getTexto() . '</span>'
							. '</label>'
							. '<div class="controls">'
							. '</div>'
						. '</div>'
					. '</div>'
				);

			$response = $box->find('.controls')->getLast();
			$typeResponse = $question->getTipoResposta();

			if($typeResponse == 1 || $typeResponse == 2)
			{
				$type = $question->getTipoResposta() == 1 ? 'text' : 'number';
				$text = $question->getTipoResposta() == 1 ? 'RESPOSTA TIPO TEXTO' : 'RESPOSTA TIPO NÚMERO';
				$response->append('<input class="form-control text-center" data-input-id="' . $question->getId() . '" type="' . $type . '" placeholder="' . $text . '" readonly>');
			}
			elseif($typeResponse == 3)
			{
				$options = AlternativaQuery::create()->filterByPergunta($question)->find();

				foreach($options as $i => $option)
				{
					if($i == 0)
						$response->append('<div class="row"></div>');

					$id = $option->getId();

					$htmlOption =
						'<div class="form-group col-md-6">'
							. '<div class="controls checkbox check-success">'
								. '<input type="checkbox"  class="js-option" id="' . $id . '" data-text-option="' . $option->getTexto() . '" data-option-id="' . $option->getId() . '" disabled>'
								. '<label for="' . $id . '" class="form-label">'
									. $option->getTexto()
								. '</label>'
							. '</div>'
						. '</div>';

					$countReponse = $response->find('.row')->getLast()->childNodes->length;

					if($countReponse == 2)
						$response->append('<div class="row"></div>');

					$box->find('.row')->getLast()->append($htmlOption);
				}
			}
			else
			{
				$options = AlternativaQuery::create()->filterByPergunta($question)->find();

				foreach($options as $i => $option)
				{
					if($i == 0)
						$response->append('<div class="row"></div>');

					$id = $option->getId();

					$htmlOption =
						'<div class="form-group col-md-6">'
							. '<div class="controls radio radio-success">'
								. '<input type="radio"  id="' . $id . '"  class="js-option" data-text-option="' . $option->getTexto() . '" data-option-id="' . $option->getId() . '" disabled>'
								. '<label for="' . $id . '" class="form-label">'
									. $option->getTexto()
								. '</label>'
							. '</div>'
						. '</div>';

					$countReponse = $response->find('.row')->getLast()->childNodes->length;

					if($countReponse == 2)
						$response->append('<div class="row"></div>');

					$box->find('.row')->getLast()->append($htmlOption);
				}
			}
		}
	}

	/*
	 * Adiciona as respostas ao objeto.
	 * @param PropelCollection $responses Respostas da pesquisa.
	 */
	public function addResponses(PropelCollection $responses)
	{
		foreach($responses as $response)
		{
			$typeReponse = $response->getPergunta()->getTipoResposta();

			if($typeReponse == 1 || $typeReponse == 2)
			{
				$input = $this->find('input[data-input-id="' . $response->getPerguntaId() . '"]')->getFirst();

				if($input)
				{
					$input->removeAttribute('disabled');
					$input->setAttribute('readonly', true);
					$input->setAttribute('value', $response->getTexto());
				}
			}
			elseif($typeReponse == 3 || $typeReponse == 4)
			{
				$checkbox = $this->find('input[data-option-id="' . $response->getAlternativaId() . '"]')->getFirst();

				if($checkbox)
					$checkbox->setAttribute('checked', true);
			}
		}

	}
}
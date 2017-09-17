<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.3
 * @package Html
 * @subpackage Component
 */

/**
 * Cria divs com os publicos alvos adicionados em uma pesquisa.
 * @author Bruno Cordeiro.
 * @version 0.1
 */
class TargetAudienceComponent extends HtmlComponent
{
	/**
	 * @param PropelCollection $publicAudience Coleção de objetos contendo
	 * os publicos alvos de uma pesquisa.
	 */
	public function populate(PropelCollection $publicAudience)
	{
		$htmlDefault = null;

		foreach($publicAudience as $i => $publicTarget)
		{

			$mt10 = $i > 0 ? 'm-t-10' : '';
			$mans = $publicTarget->getQuantidadeMasculino();
			$womans = $publicTarget->getQuantidadeFeminino();
			$initialAge = $publicTarget->getIdadeInicial();
			$finalAge = $publicTarget->getIdadeFinal();

			$htmlDefault .= '<div class="row p-t-10 p-b-10 bg-f2f2f0 ' . $mt10 . '">'
								. '<div class="form-group col-md-6">'
									. '<label class="form-label">Meta de Homens e Mulheres</label>'
									. '<div class="controls">'
										. '<input type="text" name="quantidade-homens" class="col-md-6 text-center cursor-not-allowed" readonly value="' . $mans . '">'
										. '<input type="text" name="quantidade-mulheres" class="col-md-6 text-center cursor-not-allowed" readonly value="' . $womans . '">'
									. '</div>'
								. '</div>'

								. '<div class="form-group col-md-6">'
									. '<label class="form-label">Faixa etária</label>'
									. '<div class="controls">'
										. '<input type="text" name="idade-minima" class="col-md-6 text-center cursor-not-allowed" readonly value="' . $initialAge . '">'
										. '<input type="text" name="idade-maxima" class="col-md-6 text-center cursor-not-allowed" readonly value="' . $finalAge . '">'
									. '</div>'
								. '</div>'
							. '</div>';
		}

		$this->append($htmlDefault);
	}
}
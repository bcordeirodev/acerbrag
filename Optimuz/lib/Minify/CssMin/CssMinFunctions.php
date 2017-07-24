<?php
/**
 * cssmin.php - A simple CSS minifier.
 * --
 *
 * Functions used with the main class.
 * --
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING
 * BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 * --
 *
 * @package 	Minify
 * @subpackage 	CssMin
 * @author 		Joe Scylla <joe.scylla@gmail.com>
 * @copyright 	2008 Joe Scylla <joe.scylla@gmail.com>
 * @license 	http://opensource.org/licenses/mit-license.php MIT License
 * @version 	1.0.1.b3 (2008-10-02)
 */

/**
 * Trims all elements of the array and removes empty elements.
 *
 * @param	array		$array
 * @return	array
 */
function cssmin_array_clean(array $array)
{
	$r = array();
	$c = count($v);

	if (cssmin_array_is_assoc($array))
	{
		foreach ($array as $key => $value)
			$r[$key] = trim($value);
	}
	else
	{
		foreach ($array as $value)
		{
			if (trim($value) != "")
				$r[] = trim($value);
		}
	}

	return $r;
}

/**
 * Return if a value is an associative array.
 *
 * @param	array		$array
 * @return	bool
 */
function cssmin_array_is_assoc($array)
{
	if(!is_array($array))
	{
		return false;
	}
	else
	{
		krsort($array, SORT_STRING);
		return !is_numeric(key($array));
	}
}

/**
 * Encodes an url() expression.
 *
 * @param	array	$match
 * @return	string
 */
function cssmin_encode_url($match)
{
	return "url(" . base64_encode(trim($match[1])) . ")";
}

/**
 * Decodes an url() expression.
 *
 * @param	array	$match
 * @return	string
 */
function cssmin_decode_url($match)
{
	return "url(" . base64_decode($match[1]) . ")";
}
?>

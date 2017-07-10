<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
    /*
		echo $this->Html->meta('icon');
		echo $this->fetch('css');
    */
    echo $this->Html->css('styles');
    echo $this->Html->script('responsive-nav');

		echo $this->fetch('script');
    echo $this->fetch('meta');

	?>

</head>
<body>
	<div id="container">
    <div id="header">
    </div>
    <div role="navigation" id="foo" class="nav-collapse">
      <ul>
          <li><a href="/cakephp/news/">News</a></li>
          <li><a href="/cakephp/coupons/">クーポン</a></li>
          <li><a href="/cakephp/messages/">メッセージ</a></li>
          <li><a href="/cakephp/stamps/">スタンプ</a></li>
          <li><a href="/cakephp/members/">会員</a></li>
      </ul>
    </div>

    <div role="main" class="main">
      <a href="#nav" class="nav-toggle">Menu</a>
			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>

		</div>
		<div id="footer">

		</div>
	</div>
  <script>
    var navigation = responsiveNav("foo", {customToggle: ".nav-toggle"});
  </script>
</body>
</html>

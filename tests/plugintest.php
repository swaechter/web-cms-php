<?php

/**
 * The class PluginTest is a test for the plugin manager
 */
class PluginTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Test for the plugin manager.
	 */
	public function testPluginManager()
	{
		$pluginmanager = new Pluginmanager("tests/plugintest/");
		
		$plugins = array();
		
		foreach(get_declared_classes() as $class)
		{
			if(in_array("Plugin", class_implements($class)))
			{
				$plugins[] = $class;
			}
		}
		
		$fooplugin = new FooPlugin();
		$barplugin = new BarPlugin();
		
		$this->assertEquals(count($plugins), 2);
		
		$this->assertSame($fooplugin->getName(), "foo");
		$this->assertSame($fooplugin->getDisplayName(), "Foo");
		$this->assertSame($fooplugin->getDescription(), "Foo is a test plugin.");
		
		$this->assertSame($barplugin->getName(), "bar");
		$this->assertSame($barplugin->getDisplayName(), "Bar");
		$this->assertSame($barplugin->getDescription(), "Bar is a test plugin.");
	}
}

?>

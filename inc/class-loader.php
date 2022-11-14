<?php

namespace Big_Bite\Block_Boilerplate;

/**
 * Losads for handling assets.
 */
class Loader
{
	private const SCRIPT_NAME          = 'block-boilerplate-script';
	private const STYLE_NAME           = 'block-boilerplate-style';
	private const FRONTEND_SCRIPT_NAME = 'block-boilerplate-frontend-script';
	private const FRONTEND_STYLE_NAME  = 'block-boilerplate-frontend-style';

	/**
	 * Initialise the hooks and filters.
	 */
	public function __construct()
	{
		add_action('enqueue_block_editor_assets', [$this, 'enqueue_block_editor_assets'], 1);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_assets']);
		add_action('init', [$this, 'register_bb_boilerplate']);
	}

	/**
	 * Enqueue any required assets for the block editor.
	 *
	 * @return void
	 */
	public function enqueue_block_editor_assets(): void
	{
		$plugin_name = basename(BIG_BITE_BLOCK_BOILERPLATE_DIR);

		wp_enqueue_script(
			self::SCRIPT_NAME,
			plugins_url($plugin_name . '/dist/scripts/' . BLOCK_BOILERPLATE_EDITOR_JS,),
			['wp-blocks', 'wp-i18n', 'wp-element', 'wp-plugins', 'wp-edit-post'],
			filemtime(BIG_BITE_BLOCK_BOILERPLATE_DIR . '/dist/scripts/' . BLOCK_BOILERPLATE_EDITOR_JS),
			BLOCK_BOILERPLATE_VERSION
		);

		wp_enqueue_style(
			self::STYLE_NAME,
			plugins_url($plugin_name . '/dist/styles/' . BLOCK_BOILERPLATE_EDITOR_CSS),
			[],
			filemtime(BIG_BITE_BLOCK_BOILERPLATE_DIR . '/dist/styles/' . BLOCK_BOILERPLATE_EDITOR_CSS)
		);
	}

	/**
	 * Enqueue any required assets for the frontend.
	 *
	 * @return void
	 */
	public function enqueue_frontend_assets()
	{
		$plugin_name = basename(BIG_BITE_BLOCK_BOILERPLATE_DIR);
		wp_enqueue_script(
			self::FRONTEND_SCRIPT_NAME,
			plugins_url($plugin_name . '/dist/scripts/' . BLOCK_BOILERPLATE_FRONTEND_JS),
			[],
			filemtime(BIG_BITE_BLOCK_BOILERPLATE_DIR . '/dist/scripts/' . BLOCK_BOILERPLATE_FRONTEND_JS)
		);

		wp_enqueue_style(
			self::FRONTEND_STYLE_NAME,
			plugins_url($plugin_name . '/dist/styles/' . BLOCK_BOILERPLATE_FRONTEND_CSS),
			[],
			filemtime(BIG_BITE_BLOCK_BOILERPLATE_DIR . '/dist/styles/' . BLOCK_BOILERPLATE_FRONTEND_CSS)
		);
	}

	public function register_bb_boilerplate()
	{
		register_block_type(
			__DIR__ . '/Block/block.json',
			[
				'render_callback'   => 'bigbite_render_boilerplate_block',
			]
		);

		// register_block_type(
		// 	__DIR__ . '/Item/block.json',
		// 	[
		// 		'render_callback'   => 'bigbite_render_accordion_item_block',
		// 	]
		// );
	}
}

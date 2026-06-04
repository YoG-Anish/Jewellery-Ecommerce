// Register Parent
wp.blocks.registerBlockType('claystudio/hero-slider', {
    title: 'Hero Slider',
    icon: 'slides',
    category: 'layout',
    edit: function(props) {
        return wp.element.createElement(wp.blockEditor.InnerBlocks, {
            allowedBlocks: ['claystudio/hero-slide']
        });
    },
    save: function() {
        return wp.element.createElement(wp.blockEditor.InnerBlocks.Content);
    },
});

// Register Child
wp.blocks.registerBlockType('claystudio/hero-slide', {
    title: 'Slide Item',
    parent: ['claystudio/hero-slider'],
    icon: 'format-image',
    category: 'layout',
    edit: function() {
        // Here you can drop other blocks (Image, Heading, Buttons)
        return wp.element.createElement(wp.blockEditor.InnerBlocks, {
            template: [
                ['core/columns', {}, [
                    ['core/column', {}, [['core/image']]],
                    ['core/column', {}, [['core/heading'], ['core/paragraph'], ['core/buttons']]]
                ]]
            ]
        });
    },
    save: function() {
        return wp.element.createElement(wp.blockEditor.InnerBlocks.Content);
    },
});
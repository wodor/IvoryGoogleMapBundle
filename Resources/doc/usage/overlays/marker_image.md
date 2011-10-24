# Marker image (Equivalent to marker icon & marker shape)

Markers may define an icon to show in place of the default icon or a shadow to shown in place of the default shadow. 
Defining an icon or a chadow involves setting a number of properties that define the visual behavior of the marker.

## Build your marker image

### By configuration file

By default, the bundle doesn't need any configuration. Most of the service have a default configuration which allows you to use the given objects like they are.
The ``ivory_google_map.marker_image`` service is. The configuration describes below is this default configuration.

```
# app/config/config.yml

ivory_google_map:
    marker_image:
        # Prefix used for the generation of the marker image javascript variable
        prefix_javascript_variable: "marker_image_"

        # Url of the marker image
        url: "http://maps.gstatic.com/mapfiles/markers/marker.png"

        # Anchor of the marker image
        # By default, there is no anchor
        anchor:
            x: 20
            y: 34

        # Origin of the marker image
        # By default, there is no origin
        origin:
            x: 0
            y: 0
        
        # Size of the marker
        # By default, there is no size
        size:
            width: 10
            height: 34
            width_unit: "px"
            height_unit: "px"

        # Scaled size of the marker image
        # By default there is not scaled size
        scaled_size:
            width: 10
            height: 34
            width_unit: "px"
            height_unit: "px"
```

``` php
<?php

// Requests the ivory google map marker image service
$markerImage = $this->get('ivory_google_map.marker_image');
```

### By coding

``` php
<?php

// Requests the ivory google map marker image service
$marker = $this->get('ivory_google_map.marker_image');

// Configure your marker image options
$markerImage->setPrefixJavascriptVariable('marker_image_');
$markerImage->setUrl('http://maps.gstatic.com/mapfiles/markers/marker.png');
$markerImage->setAnchor(20, 34);
$markerImage->setOrigin(0, 0);
$markerImage->setSize(20, 34, "px", "px");
$markerImage->setScaledSize(20, 34, "px", "px");
```

## Add your marker image to the marker

Now you have configurated your marker image, you need to add it like an icon or a shadow to your marker.

### Like an icon

``` php
<?php

// Requests the ivory google map marker image service
$markerImage = $this->get('ivory_google_map.marker_image');

// Add your marker image to the marker like an icon
$marker->setIcon($markerImage);
```

### Like a shadow

``` php
<?php

// Requests the ivory google map marker image service
$markerImage = $this->get('ivory_google_map.marker_image');

// Add your marker image to the marker like a shadow
$marker->setShadow($markerImage);
```
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema"
    exclude-result-prefixes="xs"
    version="2.0">
    <xsl:output method="html" encoding="UTF-8" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/strict.dtd"/>
    <xsl:template match="/">
        <html>
            <head>
                <title> CatalogoVOD </title>
                <style>
                    table {
                    border-collapse: collapse;
                    width: 100%;
                    }
                    
                    th, td {
                    padding: 8px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                    }
                    
                    th {
                    background-color: #333;
                    color: white;
                    }
                    
                    .table-dark {
                    background-color: #333;
                    color: white;
                    }
                </style>
            </head>
            <body>
                <header class="header">
                    <div class="logo">
                        <a href="catalogovod.xls"><img src="LOGOCLAN.png" alt="Logo de la marca"></img> </a>
                    </div>
                    <nav>
                        <ul>
                        </ul>            
                    </nav>
                </header>
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>Peliculas</th>
                        </tr>
                        <tr>
                            <td>Titulo</td>
                            <td>Duracion</td>
                            <td>Genero</td>
                        </tr>                        
                    </thead>
                    <tbody>
                        <xsl:for-each select="CatalogoVOD/contenido/peliculas/genero/titulo">
                        <tr>
                            <td><xsl:value-of select="."/></td>
                            <td><xsl:value-of select="@duracion"/></td>
                            <td><xsl:value-of select="../@nombre"/></td>
                        </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
                
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>Series</th>
                        </tr>
                        <tr>
                            <td>Titulo</td>
                            <td>Duracion</td>
                            <td>Genero</td>
                        </tr>                        
                    </thead>
                    <tbody>
                        <xsl:for-each select="CatalogoVOD/contenido/series/genero/titulo">
                            <tr>
                                <td><xsl:value-of select="."/></td>
                                <td><xsl:value-of select="@duracion"/></td>
                                <td><xsl:value-of select="../@nombre"/></td>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
            </body>
        </html>
        
    </xsl:template>    
</xsl:stylesheet>
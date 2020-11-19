<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">


<html> 
<body>

<style>
header{
		background-color:#ffefd7;
		padding:30px;
		margin:0px;
		border: solid black 2px;
	}
</style>
  <header style="background-color:#ffefd7;
		padding:30px;
		margin:0px;
		border: solid black 2px;"><h1>Some stats on low wage work force in India.</h1></header>
  
  <table border="0" >
    <tr bgcolor="#F2F3F4" padding="5px">
      <th style="text-align:left">India Labour</th>
      <th style="text-align:left">Last</th>
      <th style="text-align:left">Previous</th>
      <th style="text-align:left">Highest</th>
      <th style="text-align:left">Lowest</th>
      <th style="text-align:left">Unit</th>
    </tr>
    <xsl:for-each select="Job/jobinfo">
    <tr>
      <td style="background: beige"><xsl:value-of select="labour"/></td>
      <td style="background: beige"><xsl:value-of select="last"/></td>
      <td style="background: beige"><xsl:value-of select="previous"/></td>
      <td style="background: beige"><xsl:value-of select="highest"/></td>
      <td style="background: beige"><xsl:value-of select="lowest"/></td>
      <td style="background: beige"><xsl:value-of select="unit"/></td>
    </tr>
    </xsl:for-each>
  </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>


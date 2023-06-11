<%@ page session="true" contentType="text/html; charset=ISO-8859-1" %>
  <%@ taglib uri="http://www.tonbeller.com/jpivot" prefix="jp" %>
    <%@ taglib prefix="c" uri="http://java.sun.com/jstl/core" %>


      <jp:mondrianQuery id="query01" jdbcDriver="com.mysql.jdbc.Driver"
        jdbcUrl="jdbc:mysql://localhost/adventureworksdw?user=root&password="
        catalogUri="C:/xampp/tomcat/webapps/mondrian2/WEB-INF/queries/adventureworksdw.xml">

        select {[Measures].[Jumlah Pembelian],[Measures].[Total Harga]} ON COLUMNS,
        {([Product].[All Products],[Date].[All Dates],[Vendor].[All Vendors])} ON ROWS
        from [Beli]


      </jp:mondrianQuery>





      <c:set var="title01" scope="session">Query WHADVENTUREWORKS using Mondrian OLAP</c:set>